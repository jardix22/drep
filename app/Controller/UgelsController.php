<?php
class UgelsController extends AppController
{
	public function index()
	{
		$this->set('ugels', $this->Ugel->find('all', array('recursive' => 0)));
	}

	public function show($ugelId=null)
	{
		$this->loadModel('Code');
		$this->loadModel('Specialist');
		
		// Let's remove the hasMany...
	    $this->Specialist->unbindModel(
	        array('belongsTo' => array('Ugel', 'User', 'Code'))
	    );

	    $specialists =  $this->Code->find('all', array('fields' => array('id', 'description')));
		$ugel = $this->Ugel->find('first', array(
			'conditions' => array('id' => $ugelId), 
			'recursive' => 2			)
		);
		$data = array();

	    foreach ($specialists as $key => $specialist) {
			$specialists[$key]['State'] = false;
			foreach ($ugel['Specialist'] as $ugel_specialist) {
				if ($specialist['Code']['id'] == $ugel_specialist['code_id']) {
					$specialists[$key]['State'] = true;
					$specialists[$key]['Person'] = array('names' => $ugel_specialist['Person']['names']);
				}
			}	    	
	    } 

	    $this->set('specialists', $specialists);
	    $this->set('specialists', $specialists);
	    $this->set('ugel', $ugel);
		$this->Session->write('currentUgel', $ugel['Ugel']);
	}

	// El unbindModel solo funciona en la mima accion
	public function demo()
	{
		$ugelId=1;
		$ugel = $this->Ugel->find('first', array('conditions' => array('id' => $ugelId), 'recursive' => 2));
		$this->set('ugel', $ugel);

		// Let's use bindModel() to add a new association
	    // to the Leader model:
	    /*
	    $this->Leader->bindModel(
	        array('hasMany' => array(
	                'Principle' => array(
	                    'className' => 'Principle'
	                )
	            )
	        )
	    );
		// Let's remove the hasMany...
		$this->Leader->unbindModel(
			array('hasMany' => array('Follower'))
		);
		*/
	}
}