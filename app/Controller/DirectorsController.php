<?php

class DirectorsController extends AppController
{
	public function show()
	{
		
	}
	public function evaluation()
	{
		$this->loadModel('Institution');

		$type = $this->request->query['type']; // nivel eduactivo
		$institutionId= $this->request->query['institution']; // id institucion
		
		/*Inicialisar Sesion de Institución */
		$this->Session->write('institutionSession', $this->Institution->find('first', array('conditions' => array('id' => $institutionId), 'recursive' => -1)));
		
		$this->redirect(array('controller' => 'evaluations', 'action' => 'take', 4)); // 4 : test de directores
	}
}
