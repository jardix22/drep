<?php
	/**
	* 
	*/
	class SpecialistsController extends AppController
	{
		public function beforeFilter()
        {
			$this->set('current_user', $this->Auth->User());
            parent::adminRequired();
        }

		public function index()
		{
			$this->set('specialists', $this->Specialist->find('all', array('recursive' => 0)));
		}

		public function add()
		{
			$this->loadModel('Code');
			$this->loadModel('Ugel');

			$this->set('ugels', $this->Ugel->find('list'));
			$this->set('codes', $this->Code->find('list', array('fields' => array('id', 'description'))));
		}

		public function save()
		{
			$this->loadModel('User');
			$this->loadModel('Person');
			if ($this->request->data) {
				//unset($this->Student->ProfessionalTitle->validate['specialist_id']);
				//$this->Person->save($this->request->data['Person']);
				//$this->User->save($this->request->data['User']);
				
				//$specialist['Specialist'] = array('user_id' => $this->User->id, 'ugel_id' => );
				//$this->Specialist->save();

				$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], null, true);
				$this->request->data['User']['role'] = 'B';

				if ($this->Specialist->saveAssociated($this->request->data)) {					
					$this->Session->setFlash("Estudiante Registrado");
				} else {
					$this->Session->setFlash("Error al Registrar Estudiante ");
				}
				
			}

		}

		public function edit($id = null)
		{
			if (!$id) {
				
			}else{
				$this->redirect(array('action' => 'index'));
			}

		}

	}
?>