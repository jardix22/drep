<?php

class DirectorsController extends AppController
{
	public $uses = array('Director', 'Institution', 'Worker');

	public function add()
	{
		$this->loadModel('Person');
		$institution = $this->Session->read('currentInstitution');
		$this->set('institution', $institution);		

		if ($this->request->is('post')) {
			if ($this->Person->save($this->request->data['Person'])) {

				$this->request->data['User']['role'] = 'C';
				$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], null, true);

				$this->request->data['Worker']['type'] = 2;
				$this->request->data['Worker']['institution_id'] = $institution['Institution']['id'];
				$this->request->data['Worker']['person_id'] = $this->Person->id;

				if ($this->Director->saveAssociated($this->request->data)) {
					$this->redirect(array('action' => 'detail', $institution['Institution']['id']));
				}
			}
		} else {
		}
	}

	public function detail($institutionId) {

		$institution = $this->Institution->find('first', array('conditions' => array('id' => $institutionId), 'recursive' => -1));
		$this->Session->write('currentInstitution', $institution);
		$this->set('institution', $institution);

		// se consulta la existencia del director
		$existDirector = ($this->Worker->find( 'count', array('conditions' => array('type' => 2, 'institution_id' => $institutionId), 'recursive' => 0)) > 0) ? true : false ;
		$this->set(	'existDirector', $existDirector	);	

		if ($existDirector) {

			$director = $this->Worker->find( 'first', array('conditions' => array('type' => 2, 'institution_id' => $institutionId), 'recursive' => 0));
			$this->set('director', $director);

			// Se consulta si el director ha sido evaluado
			$this->loadModel('Evaluation');
			$isEvaluate =  ($this->Evaluation->find('count', array('conditions' => array('Worker_id' => $director['Worker']['id']))) > 0) ? true : false ;
			$this->set('isEvaluate', $isEvaluate);

			if ($isEvaluate) {
				$this->set('score', $this->Evaluation->find('first', array('conditions' => array('Worker_id' => $director['Worker']['id']), 'fields' => 'score')));
			}
		}
	}
}
