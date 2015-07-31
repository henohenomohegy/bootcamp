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

	}

}


