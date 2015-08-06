<?php

App::uses('AppController', 'Controller');
class PagesController extends AppController {

	public $components = array('Session', 'Auth');
	public $uses = array(
		'Category',
		'Comment',
		'Topic',
		'User'
	);
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'detail');
        $this->set('user', $this->Auth->user());
    }

	public function index() {
		$topics = $this->Topic->find('all');
		$this->set('topics', $topics);
	}

    public function detail () {
        // パラメーターを取得
        $id = $this->request->params['id'];

        if (!$this->Topic->exists($id)) {
            throw new NotFoundException(__('Invalid topic'));
        }

        $options = array( 
            'conditions' => array(
                'Topic.id' => $id
            )
        );

        $this->set('topic', $this->Topic->find('first', $options));

        $this->request->data['Comment']['topic_id'] = $id;
        if($this->request->is('post')){
            $this->Topic->Comment->create();
            if($this->Topic->Comment->save($this->request->data)){
                $this->Session->setFlash('complete');
                $this->redirect($this->referer());
            }
        }
        
        $topic_comments = $this->Topic->Comment->find('all', array(
            'fields' => array('Comment.comment', 'Comment.title', 'Comment.comment_name'),
            'conditions' => array('Comment.topic_id' => $id),
            
        ));
        $user = $this->Auth->user();
        $this->set(compact('topic_comments', 'user'));
        
    }
}
