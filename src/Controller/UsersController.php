<?php
namespace App\Controller;

class UsersController extends AppController
  {
    public function index(){
    $usuarios = $this->Users->find()->all();
    $this->set(compact('usuarios'));
   }

  public function view($id = null){
    $user = $this->Users->get($id);
    $this->set(['result' => $user]);
  }

  public function add(){
  

    $user = $this->Users->newEntity();
    if($this->request->is('post')){
      $user = $this->Users->patchEntity($user, $this->request->data);
      if($this->Users->save($user)){
        $this->Flash->success('Usuário cadastrado com sucesso');
        return $this->redirect(['action'=>'index']);
        }
      else{
        $this->Flash->error('Erro ao cadastrar usuário');
      }
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

  public function remove($id=null){
    $this->request->allowMethod(['post', 'delete']);
    $user = $this->Users->get($id);
    $this->Users->delete($user);




    $entity = $this->Users->get($id);
    $result = $this->Users->delete($entity);
  }

}
