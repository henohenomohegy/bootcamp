<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
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

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {

		$topics = $this->Topic->find('all');
		$this->set('topics', $topics);
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function index(){
		$topic = $this->Topic->find('all');
		$this->set('topic', $topic);

	}
	public function add() {
    	if ($this->request->is('post')) {
        	$this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
        	if ($this->Post->save($this->request->data)) {
            	$this->Session->setFlash(__('Your post has been saved.'));
            	$this->redirect(array('action' => 'index'));
        	}
    	}
	}

	public function view(){
		$topic_detail = $this->find('all');
		$this->set(compact('topic_detail'));
	}
}


