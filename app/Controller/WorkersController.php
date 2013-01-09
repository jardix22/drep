<?php

class WorkersController extends AppController
{
	public function index( )
	{
		$institution = $this->Session->read('currentInstitution');
		$this->set('institution', $institution); // institucion educativa actual
		$this->set('testType', $institution['Institution']['level_id']); // tIpo de prueba
		$this->set(
			'workers', 
			$this->Worker->find('all', array('conditions' => array('institution_id' => $institution['Institution']['id'], 'type' => 1), 'recursive' => 1))
		);
	}
}