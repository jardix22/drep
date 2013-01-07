<?php
class EvaluationsController extends AppController
{
	public function take($id=null)
	{
		$this->loadModel('Test');

		if($this->request->is('get')){

			$this->set('type', $id);
			$this->set('institution', $this->Session->read('institutionSession'));
			$this->set('specialist', $this->Session->read('currentSpecialist'));
			$this->set('test', $this->Test->find(
				'first',
				array(
					'conditions' => array('type' => $id),
					'recursive' => 3
				)
			));
		}
	}

	public function save($id=null)
	{
		$this->loadModel('Person');
		$this->loadModel('Worker');

		$data = $this->request->data;
		$institution = $this->Session->read('institutionSession');
		$total = 0;

		// ---- Guardar ---- //

		if ($this->Person->save($data['Person'])) {
			
			$data['Worker']['person_id'] = $this->Person->id;
			
			if ($this->Worker->save($data['Worker'])) {
				
				foreach ( $data['Question'] as $question) {
					$total = $total + $question;
				}

				$data['Evaluation']['worker_id'] = $this->Worker->id;
				$data['Evaluation']['score'] = $total;

				if($this->Evaluation->save($data['Evaluation'])){
					
					$this->Session->setFlash("Exitos ". $this->Person->names . " ha obtenido: " . $total . "puntos.");			
					
					// redirecciona a la institucion y lista docentes
					


					// redirecciona a la institucion y lista docentes
					
					$this->redirect(array(
						'controller' => 'workers',
						'action' => 'index',
						'?' => array(
							'type' => $institution['Institution']['level_id'], // Nivel de la institución
							'institution' => $institution['Institution']['id'] // Id de la inslitución
						)
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