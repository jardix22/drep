<?php
 /**
* 
*/
class HomeController extends AppController
{
	public function index()
	{
		
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
}
