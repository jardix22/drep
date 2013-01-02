<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	
	public $layout = 'bootstrap/bootstrap_layout';

	public $helpers = array('Form', 'Html', 'BtForm');

	public $components = array(
		'Session',
		'Auth' => array(
			'loginAction' => array( 'controller' => 'sessions', 'action' => 'login' ),
			'loginRedirect' => array('controller' => 'home', 'action' =>'institution', 1),
			'logoutRedirect' => array('controller' => 'sessions', 'action' => 'login'),
			'authError' => 'You cant access that page',
			'authorize' => array('Controller')
		)
	);

	public function isAuthorized($user){
		return true; 
	}
	
	public function isAdmin()
	{
		if ($this->Auth->User('role') == 'A') {
			return true;
		}else{
			return false;
		}	
	}

	public function adminRequired()
	{
		if (!$this->isAdmin()) {
			$this->redirect('/');
		}
	}

	public function beforeFilter()
	{
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->User());
	}
}
