<?php
 /**
* 
*/
class HomeController extends AppController
{
	public function index()
	{
		// En rutar direcciones
		$this->redirect($this->Session->read('currentRootPath'));
	}

	public function institution($levelId=null)
	{
		$this->loadModel('Institution');

		$user = $this->Auth->User();
		$ugelId = $user['Specialist']['ugel_id'];

		if ($levelId != null) {
			$institutions = $this->Institution->find('all', array('recursive' => -1, 'conditions' => array('level_id' => $levelId, 'ugel_id' => $ugelId)));
			$this->set('institutions', $institutions);
			$this->set('levelId', $levelId);
		}		
	}

	public function secondary()
	{
		$this->loadModel('Institution');

		$user = $this->Auth->User();
		$ugelId = $user['Specialist']['ugel_id'];

		$institutions = $this->Institution->find('all', array('recursive' => -1, 'conditions' => array('level_id' => 3, 'ugel_id' => $ugelId)));
		$this->set('institutions', $institutions);
		$this->set('levelId', 3);
	}
}
