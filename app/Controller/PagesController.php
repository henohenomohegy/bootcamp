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
        $this->Auth->allow('display');
        $this->set('user', $this->Auth->user());
    }

	public function display() {
		$topics = $this->Topic->find('all');
		$this->set('topics', $topics);
	}
}
