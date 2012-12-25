<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	
	public $helpers = array('Form', 'Html');

	public $components = array(
		'Session',
		'Auth' => array(
			'loginAction' => array( 'controller' => 'sessions', 'action' => 'login' ),
			'loginRedirect' => array('controller' => 'home', 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'sessions', 'action' => 'login'),
			'authError' => 'You cant access that page',
			'authorize' => array('Controller')
		)
	);

	public function isAuthorized($user){
		return true; 
	}
	
	public function beforeFilter()
	{
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->User());
	}
}
