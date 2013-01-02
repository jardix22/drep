<?php 

class TestsController extends AppController{
	public $uses = 'Test';

	public function beforeFilter()
    {
		parent::adminRequired();
		$this->set('current_user', $this->Auth->User());
    }

	
	public function index()
	{
		$this->set('tests', $this->Test->find('all'));
	}

	public function add()
	{}

	public function save()
	{
		$this->Test->save($this->request->data);
		$this->redirect(array('action' => 'index'));
	}

	public function edit($id=null)
	{
		$this->Test->id = $id;
		if($this->request->is('get')){
			$this->request->data = $this->Test->read();
		}else{
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Your post has been updated.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function build($id=null)
	{
		$this->Test->id = $id;
		if($this->request->is('get')){
			$this->request->data = $this->Test->read();
		}else{
			if ($this->Test->save($this->request->data)) {
				$this->Session->setFlash('Your post has been updated.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	public function preview($id=null){
		$this->Test->id = $id;
		
		if($this->request->is('get')){
			$this->set('test', $this->Test->find(
				'first', 
				array(
					'conditions' => array('id' => $id),
					'recursive' => 3
					)
			));
		}
	}
}