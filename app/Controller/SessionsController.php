<?php
	class SessionsController extends AppController {
		public $uses = 'User';

        public function login()
        {
            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                     $this->redirect($this->Auth->redirect());  
                } else {
                    $this->Session->setFlash('Su usuario/contraseña son incorrectas');
                }   
            }else{
                if ($this->Auth->login()) {
                    $this->Session->setMessage("Usted ya inicio su Sesion.");
                    $this->redirect(array('controller' => 'dandelion', 'action' => 'index'));
                } 
            }
            $this->layout = 'bootstrap/login';   
        }

        public function logout()
        {
            $this->redirect($this->Auth->logout());
        }	
	}