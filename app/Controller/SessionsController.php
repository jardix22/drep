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
					$this->Session->setMessage("Usted ya inicio su Sesion.");
					$this->redirect(array('controller' => 'dandelion', 'action' => 'index'));
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
			if ($user['role'] == 'B') {
				$this->loadModel('Specialist');
				$this->loadModel('Person');

				$specialist = $this->Specialist->find('first', array('conditions' => array('user_id' => $user['id']), 'recursive' => -1));
				$person = $this->Person->find('first', array('conditions' => array('id' => $specialist['Specialist']['user_id']), 'recursive' => -1));
				
				$specialist_person = array('Specialist' => $specialist['Specialist'], 'Person' => $person['Person']);
				$this->Session->write('currentSpecialist', $specialist_person);
			}else{
				$this->Session->write('currentSpecialist', '');
			}   
			$this->redirect($this->Auth->redirect());
		}
	}