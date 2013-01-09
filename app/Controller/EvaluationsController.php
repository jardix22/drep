<?php
class EvaluationsController extends AppController
{
	public function take($type=null)
	{
		$this->loadModel('Test');

		if($this->request->is('get')){

			$this->set('type', $type);
			//$this->set('level', $type);

			$this->set('institution', $this->Session->read('currentInstitution'));
			
			$this->set('specialist', $this->Session->read('currentSpecialist'));
			$this->set('test', $this->Test->find(
				'first',
				array(
					'conditions' => array('type' => $type),
					'recursive' => 3
				)
			));
		}
	}

	public function takeDirector($typeId=null, $workerId=null)
	{
		$this->loadModel('Test');
		$this->Session->write('workerIdSession', $workerId);

		if($this->request->is('get')){

			$this->set('type', $typeId);
			$this->set('institution', $this->Session->read('currentInstitution'));
			$this->set('specialist', $this->Session->read('currentSpecialist'));
			$this->set('test', $this->Test->find(
				'first',
				array(
					'conditions' => array('type' => $typeId),
					'recursive' => 3
				)
			));
		}
	}


	public function saveDirector($id=null)
	{
		$this->loadModel('Person');
		$this->loadModel('Worker');

		$data = $this->request->data;
		$institution = $this->Session->read('currentInstitution');
		$total = 0;

		// ---- Guardar ---- //
			
		foreach ( $data['Question'] as $question) {
			$total = $total + $question;
		}

		$data['Evaluation']['worker_id'] = $this->Session->read('workerIdSession');
		$data['Evaluation']['score'] = $total;

		if($this->Evaluation->save($data['Evaluation'])){
			$this->Session->setFlash("Exitos ". $this->Person->names . " ha obtenido: " . $total . "puntos.");			
			
			// redirecciona a la institucion y lista docentes
			$this->redirect(array(
				'controller' => 'directors',
				'action' => 'detail',
				$institution['Institution']['id']
			));
			

		}else{
			$this->Session->setFlash("Error al Guarda Datos de Evaluacion");
		}
	}

		public function save($id=null)
	{
		$this->loadModel('Person');
		$this->loadModel('Worker');

		$data = $this->request->data;
		$institution = $this->Session->read('currentInstitution');
		$total = 0;

		// ---- Guardar ---- //

		if ($this->Person->save($data['Person'])) {
			
			$data['Worker']['person_id'] = $this->Person->id;
			
			//$data['Worker']['type'] = () ? a : b ;

			
			if ($this->Worker->save($data['Worker'])) {
				
				foreach ( $data['Question'] as $question) {
					$total = $total + $question;
				}

				$data['Evaluation']['worker_id'] = $this->Worker->id;
				$data['Evaluation']['score'] = $total;

				if($this->Evaluation->save($data['Evaluation'])){
					
					$this->Session->setFlash("Exitos ". $this->Person->names . " ha obtenido: " . $total . "puntos.");			
							
					// redirecciona a la institucion y lista docentes							
					$this->redirect(array(
						'controller' => 'workers',
						'action' => 'index'			
					));					

				}else{
					$this->Session->setFlash("Error al Guarda Datos de Evaluacion");
				}
			} else {
				$this->Session->setFlash("Error al Guarda Datos de Trabajador");
			}
		} else {
			$this->Session->setFlash("Error al Guarda Datos Personales");
		}
	}
}