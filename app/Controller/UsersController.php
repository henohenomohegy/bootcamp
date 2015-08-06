<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

  public $components = array('Session', 'Auth');

  public function beforeFilter()
  {
    parent::beforeFilter();

    $this->Auth->allow('register', 'login');
  }

  public function index(){
    $this->set('user', $this->Auth->user());
  }

  public function register(){

    if($this->request->is('post') && $this->User->save($this->request->data)){

      $this->Auth->login();
      $this->redirect(array('controller' => 'topics', 'action' => 'index'));
    }
  }

  public function login(){
    if($this->request->is('post')) {
      if($this->Auth->login())
        return $this->redirect(array('controller' => 'topics', 'action' => 'index'));
      else
        $this->Session->setFlash('ログインに失敗しました');
    }
  }

  public function logout(){
    $this->Auth->logout();
    $this->redirect(array('/'));
  }
}

?>