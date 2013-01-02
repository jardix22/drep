<?php

class WorkersController extends AppController
{
	public function index()
	{
		$this->loadModel('Institution');

		$type = $this->request->query['type'];
		$institutionId= $this->request->query['institution'];
		
		/*Inicialisar Sesion de Institución */
		$this->Session->write('institutionSession', $this->Institution->find('first', array('conditions' => array('id' => $institutionId), 'recursive' => -1)));

		if ($type != null) {
			$this->set('institution', $this->Session->read('institutionSession'));
			$this->set('type', $type);
			$this->set('workers', $this->Worker->find('all', array('conditions' => array('institution_id' => $institutionId), 'recursive' => 1)));

		}else{
			$this->redirect('/');
		}
	}
}