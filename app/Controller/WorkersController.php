<?php

class WorkersController extends AppController
{
	public function index()
	{
		//currentInstitutions se definira al ingresar aqui.. cuando entre como especialista

		//$institution = $this->Session->read('currentInstitution');
		
		$this->loadModel('Institution');
		$institution = $this->Institution->find('first', array('conditions' => array('id' => $this->request->pass[0])));
		$this->Session->write('currentInstitution', $institution);
		
		$this->set('institution', $institution); // institucion educativa actual
		$this->set('testType', $institution['Institution']['level_id']); // tIpo de prueba
		$this->set(
			'workers', 
			$this->Worker->find(
				'all', array(
					'conditions' => array('institution_id' => $institution['Institution']['id'], 'type' => 1), 
					'recursive' => 1
					)
				)
		);
	}

	public function other()
	{
		// currentInstitutions se define cuando en Session Controller cuando se inicia como Director en caso 
		$institution = $this->Session->read('currentInstitution');

		
		
		$this->set('institution', $institution); // institucion educativa actual
		$this->set('testType', $institution['Institution']['level_id']); // tIpo de prueba
		$this->set(
			'workers', 
			$this->Worker->find(
				'all', array(
					'conditions' => array('institution_id' => $institution['Institution']['id'], 'type' => 1), 
					'recursive' => 1
					)
				)
		);
	}
}