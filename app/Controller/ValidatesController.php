<?php
/**
* 
*/
class ValidatesController extends AppController
{
	public $components = array('RequestHandler');
	
	public function checkUser()
	{
		$this->loadModel('Person');

		$this->viewClass = 'Json';
		$this->RequestHandler->setContent('json', 'application/json');

		$result = array('isUnique' => true) ;

		$person = $this->Person->find('first', array('conditions' => array('document' => $this->request->data['term'])));
		
		if ($person) {
			$result = array('isUnique' => false) ;
		}
		
		$this->set('result', $result);
		$this->set('__serialize', 'result');	
	}	
}