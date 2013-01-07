<?php
	class AutoCompleteController extends AppController
	{
		public $components = array('RequestHandler');

		public function person()
		{

			$this->loadModel('Person');
			$this->viewClass = 'Json';
			$this->RequestHandler->setContent('json', 'application/json');

			$term = $this->request->query['term'];
			$limit = $this->request->query['maxRows'];

			$people = $this->Person->find(
				'all',
				array(
					'conditions' => array(
							'Person.document' => '%'.$term.'%'
						),
					//'conditions' => array('or' => array('Person.nombres LIKE' => '%'.$nombre.'%', 'Person.nombres LIKE' => '%'.$nombre.'%')),
					'fields' => array('Person.names', 'Person.lf_name', 'Person.lm_name'),
					'recursive' => 0,
					'limit' => $limit
				)
			);
			$this->set('people', $people);
			$this->set('__serialize', 'people');	
		}

		public function intitution()
		{
			$this->loadModel('Institution');

			$this->viewClass = 'Json';
			$this->RequestHandler->setContent('json', 'application/json');

			$name = $this->request->query['name'];
			$limit = $this->request->query['maxRows'];
			$ugel_id = $this->request->query['ugel'];
			$level_id = $this->request->query['level'];

			$institutions = $this->Person->find(
				'all',
				array(
					'conditions' => array(
							'Institution.name' => '%'.$name.'%',
							'intitution.ugel_id' => $ugel_id,
							'Institution.level_id' => $level_id
						),
					//'conditions' => array('or' => array('Person.nombres LIKE' => '%'.$nombre.'%', 'Person.nombres LIKE' => '%'.$nombre.'%')),
					'fields' => array('Intitution.id', 'Institution.name'),
					'recursive' => -1,
					'limit' => $limit
				)
			);
			$this->set('institutions', $institutions);
			$this->set('__serialize', 'institutions');
		}
	}
?>