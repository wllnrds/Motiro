<?php
namespace App\Controller;

class UsersController extends AppController
{

    public function index(){
    $users = $this->Users->find();
    $this->set(compact('users'));
  }

  public function view($id = null){
    $user = $this->Users->get($id);
    $this->set(['result' => $user]);
  }

  public function add(){
    $this->loadComponent('Paginator');
    $users = $this->Paginator->paginate($this->Users->find());

    //$user = $this->Users->get($id);
    $user = $this->Users->newEntity();
    if($this->request->is(['post', 'put'])){
      $user = $this->Users->patchEntity($user, $this->request->getData());
      $this->Users->save($user);
    }
    $this->set(compact('user'));
  }

  public function edit($id){
    $this->loadComponent('Paginator');
    $users = $this->Paginator->paginate($this->Users->find());

    $user = $this->Users->get($id);
    //$user = $this->Users->newEntity();
    if($this->request->is(['post', 'put'])){
      $user = $this->Users->patchEntity($user, $this->request->getData());
      $this->Users->save($user);
    }
    $this->set(compact('user'));
  }

  public function remove($id){
    $entity = $this->Users->get($id);
    $result = $this->Users->delete($entity);
  }

}
