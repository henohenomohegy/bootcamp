<?php
App::uses('AppController', 'Controller');

class TopicsController extends AppController {

	public $components = array('Paginator', 'Session', 'Auth');
	public function beforeFilter() {
        parent::beforeFilter();
        $user = $this->Auth->user();
        $this->Auth->allow('display', 'view');
        $this->set('user', $user);
    }
    public function index(){
    	$user = $this->Auth->user();
		$topics = $this->Topic->find('all', array(
			'conditions' => array('Topic.user_id' => $user['id'])));
		$this->set('topics', $topics);
	}

	public function add() {
		$user = $this->Auth->user();
		if ($this->request->is('post')) {
			$this->Topic->create();
			$this->request->data['Topic']['user_id'] = $user['id'];
			$this->set('data', $this->request->data);
			if ($this->Topic->save($this->request->data)) {
				$this->Session->setFlash('The topic has been saved.');
				return $this->redirect(array('controller' => 'Topics', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Topic->Category->find('list', array(
			'conditions' => array('Category.user_id' => $user['id'])));
		$this->set(compact('categories'));
	}

	public function edit($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Topic->save($this->request->data)) {
				$this->Session->setFlash(__('The topic has been saved.'));
				return $this->redirect(array('controller' => 'Topics', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
			$this->request->data = $this->Topic->find('first', $options);
		}
		$categories = $this->Topic->Category->find('list');
		$this->set(compact('categories'));
	}

	public function delete($id = null) {
		$this->Topic->id = $id;
		if (!$this->Topic->exists()) {
			throw new NotFoundException(__('Invalid topic'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Topic->delete()) {
			$this->Session->setFlash(__('The topic has been deleted.'));
		} else {
			$this->Session->setFlash(__('The topic could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'Topics', 'action' => 'index'));
	}
}