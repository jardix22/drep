<?php
	class SessionsController extends AppController {
		public $uses = 'User';

		public function login()
		{
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					$this->goingTo($this->Auth->User());
				} else {
					$this->Session->setFlash('Su usuario/contraseña son incorrectas');
				}   
			}else{
				if ($this->Auth->login()) {
					$this->Session->setFlash("Usted ya inicio su Sesion.");
					//$this->redirect(array('controller' => 'sess', 'action' => 'index'));
				} 
			}
			$this->layout = 'bootstrap/login';   
		}

		public function logout()
		{
			$this->redirect($this->Auth->logout());
		}

		public function goingTo($user)
		{
			$rootPath = array();

			if ($user['role'] == 'A') {

				$rootPath = array('controller' => 'ugels', 'action' => 'index');

			}elseif ($user['role'] == 'B') {
				$this->loadModel('Specialist');
				$this->loadModel('Person');

				$specialist = $this->Specialist->find('first', array('conditions' => array('user_id' => $user['id']), 'recursive' => 0));
				$person = $this->Person->find('first', array('conditions' => array('id' => $specialist['Specialist']['person_id']), 'recursive' => -1));
				
				//$specialist_person = array('Specialist' => $specialist, 'Person' => $person['Person']);
				$this->Session->write('currentSpecialist', $specialist);


				if ($specialist['Code']['status'] == 1) {
					$code = $specialist['Specialist']['code_id'];
					$specialistType = array(1 => 1, 2 => 2, 3 => 3);

					$rootPath = array('controller'=>'home', 'action' => 'institution', $specialistType[$code]);
				} else {
					
					$rootPath = array('controller'=>'home', 'action' => 'secondary');
				}
				
			}elseif($user['role'] == 'C') {

				$this->loadModel('Director');
				
				$director = $this->Director->find('first', array('conditions' => array('user_id' => $user['id']), 'recursive' => 0));
				$this->Session->write('currentDirector', $director);

				/// Inicialisar Sesion de Institución
				$this->loadModel('Institution');
				
				$this->Session->write(
					'currentInstitution', 
					$this->Institution->find('first', array('conditions' => array('id' => $director['Worker']['institution_id']), 'recursive' => -1))
				);
				
				$rootPath = array('controller'=>'workers', 'action' => 'other');

			}else{
				$this->Session->write('currentSpecialist', null);
				
				$rootPath  = $this->Auth->redirect();
			}			
			$this->Session->write('currentRootPath', $rootPath);
			$this->redirect($rootPath);
		}
	}