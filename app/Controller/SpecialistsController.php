<?php
	class SpecialistsController extends AppController
	{
		public function beforeFilter()
		{
			$this->set('current_user', $this->Auth->User());
			parent::adminRequired();
		}

		public function show($ugelId=null, $codeId=null)
		{
			$this->set('specialist', $this->Specialist->find('first', array(
					'recursive' => 0,
					'conditions' => array('code_id' => $codeId, 'ugel_id' => $ugelId)
					)
				)
			);

			$this->set('ugelId', $ugelId);
		}

		public function add($ugelId=null, $codeId=null)
		{
			//$ugelId = base64_decode($ugelId);
			//$codeId = base64_decode($codeId);

			if ($this->request->is('post')) {
				
				$this->loadModel('User');
				$this->loadModel('Person');
					
				$ugel = $this->Session->read('currentUgel');
				$this->request->data['Specialist']['ugel_id'] = $ugel['id'];
				$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], null, true);
				$this->request->data['User']['role'] = 'B';

				if ($this->Specialist->saveAssociated($this->request->data)) {
					$this->Session->setFlash("Estudiante Registrado");
					$this->redirect(array('controller' => 'ugels', 'action' => 'show', $ugel['id']));
				} else {
					$this->Session->setFlash("Error al Registrar Estudiante ");
				}

			} else {
				$this->loadModel('Code');

				$this->set('code', $this->Code->find('first', array('conditions' => array('id' => $codeId))));

				$this->set('codeId', $codeId);
				$this->set('ugel', $this->Session->read('currentUgel'));
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