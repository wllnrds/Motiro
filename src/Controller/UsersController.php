<?php
namespace App\Controller;

class UsersController extends AppController
  {
    public function index(){
    $users = $this->Users->find()->all();
    $this->set(compact('users'));

    $this->loadModel('Roles');
    $roles = $this->Roles->getArray();
    $this->set(compact('roles'));
  }

  public function add()
  {
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
    $roles = $this->Users->Roles->find('list', ['limit'=>200]);
    $this->set(compact('user', 'roles'));
    $this->set('_serialize', ['user']);
  }

  public function edit($id=null)
  {
    $this->loadComponent('Paginator');
    $user = $this->Users->get($id);
    if($this->request->is(['post', 'put'])){
      $user = $this->Users->patchEntity($user, $this->request->data);
      if($this->Users->save($user)){
        $this->Flash->success('Usuário editado com sucesso');
        return $this->redirect(['action' => 'index']);
      }
      else{
        $this->Flash->error('Usuário não foi editado com sucesso');
      }
    }
    $roles = $this->Users->Roles->find('list', ['limit'=>200]);
    $this->set(compact('user', 'roles'));
    $this->set('_serialize', ['user']);
  }

  public function remove($id=null){
    $this->request->allowMethod(['post', 'delete']);
    $user = $this->Users->get($id);
    if($this->Users->delete($user))
    {
      $this->Flash->success('Usuário apagado com sucesso');
    }
    else
    {
      $this->Flash->error('Usuário não foi apagado com sucesso');
    }
    return $this->redirect(['action' => 'index']);
  }

  public function view($id = null){
    $user = $this->Users->get($id);
    $this->set(['result' => $user]);
  }

  public function login(){
    if($this->request->is('post')){
      $user = $this->Auth->identify();
      if($user){
        $this->Auth->setUser($user);
        return $this->redirect(['controller' => 'pages/home']);
      }
      $this->Flash->error('Login ou senha errado');
    }
  }

  public function logout(){
    $this->Flash->success('Você foi deslogado');
    return $this->redirect($this->Auth->logout());
  }

}
