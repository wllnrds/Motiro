<?php
namespace App\Controller;

class RolesController extends AppController{
  public function add() {
    $role = $this->Roles->newEntity();
    if($this->request->is('post')){
      $role = $this->Roles->patchEntity($role, $this->request->data);
      if($this->Roles->save($role)){
        $this->Flash->success('Usuário cadastrado com sucesso');
        return $this->redirect(['controller' => 'Pages', 'action' => 'Settings']);
      }
      else{
        $this->Flash->error('Erro ao cadastrar usuário');
      }
    }
    $this->set(compact('role'));
  }
  public function edit($id=null) {
    $this->loadComponent('Paginator');
    $role = $this->Roles->get($id);
    if($this->request->is(['post', 'put'])){
      $role = $this->Roles->patchEntity($role, $this->request->data);
      if($this->Roles->save($role)){
        $this->Flash->success('Usuário editado com sucesso');
        return $this->redirect(['controller' => 'Pages', 'action' => 'Settings']);
      }
      else{
        $this->Flash->error('Usuário não foi editado com sucesso');
      }
    }
    $this->set(compact('role'));
  }
  public function remove($id=null){
    $this->request->allowMethod(['post', 'delete']);
    $role = $this->Roles->get($id);
    if($this->Roles->delete($role))
    {
      $this->Flash->success('Usuário apagado com sucesso');
    }
    else
    {
      $this->Flash->error('Usuário não foi apagado com sucesso');
    }
    return $this->redirect(['controller' => 'Pages', 'action' => 'Settings']);
  }

  public function isAuthorized($user) {
    if($user['level'] <= 1){
      return true;
    }else{
      return false;
    }
  }
}
