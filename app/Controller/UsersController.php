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
      $this->redirect(array('controller' => 'Topics', 'action' => 'index'));
    }
  }

  public function login(){
    if($this->request->is('post')) {
      if($this->Auth->login())
        return $this->redirect(array('controller' => 'Topics', 'action' => 'index'));
      else
        $this->Session->setFlash('ログイン失敗');
    }
  }

  public function logout(){
    $this->Auth->logout();
    $this->redirect(array('controller' => 'Pages', 'action' => 'display'));
  }
}

?>