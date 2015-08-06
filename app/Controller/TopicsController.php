<?php
App::uses('AppController', 'Controller');

class TopicsController extends AppController {

	public $components = array('Paginator', 'Session', 'Auth');
	public $uses = array(
		'Category',
		'Topic',
		'User'
	);

	public function beforeFilter() {
        parent::beforeFilter();
        $user = $this->Auth->user();
        $this->set('user', $user);
    }

    public function index(){
    	$user = $this->Auth->user();
		$topics = $this->Topic->find('all', array(
			'conditions' => array('Topic.user_id' => $user['id'])
		));
		$this->set('topics', $topics);
	}

	public function add() {
		$user = $this->Auth->user();
		if ($this->request->is('post')) {
			$this->Topic->create();
			$this->request->data['Topic']['user_id'] = $user['id'];
			$this->set('data', $this->request->data);
			if ($this->Topic->save($this->request->data)) {
				$this->Session->setFlash('保存に成功しました');
				return $this->redirect('/');
			} else {
				$this->Session->setFlash('保存に失敗しました');
			}
		}
		$categories = $this->Category->find('list');
		$this->set(compact('categories'));
	}

	public function edit($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException('Invalid topic');
		}
		if ($this->request->is(array('post'))) {
			if ($this->Topic->save($this->request->data)) {
				$this->Session->setFlash('保存に成功しました');
				return $this->redirect('/');
			} else {
				$this->Session->setFlash('保存に失敗しました');
			}
		} else {
			$this->request->data = $this->Topic->find('first', array(
				'conditions' => array('Topic.id' => $id)
			));
		}
		$categories = $this->Category->find('list');
		$this->set(compact('categories'));
	}

	public function delete($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException('Invalid topic');
		}

		if ($this->Topic->delete($id)) {
			$this->Session->setFlash('削除に成功しました');
		} else {
			$this->Session->setFlash('削除に失敗しました');
		}
		return $this->redirect('/');
	}
}