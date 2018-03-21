<?php
namespace App\Controller;

class TypesController extends AppController{
  public function add(){
    $type = $this->Types->newEntity();
    if($this->request->is('post')){
      $type = $this->Types->patchEntity($type, $this->request->data);
      if($this->Types->save($type)){
        $this->Flash->success('Tipo cadastrado com sucesso');
        return $this->redirect(['controller' => 'Pages', 'action' => 'Settings']);
      }
      else{
        $this->Flash->error('Erro ao cadastrar tipo');
      }
    }
    $this->set(compact('type'));
  }
  public function edit($id=null){
    $this->loadComponent('Paginator');
    $type = $this->Types->get($id);
    if($this->request->is(['post', 'put'])){
      $type = $this->Types->patchEntity($type, $this->request->data);
      if($this->Types->save($type)){
        $this->Flash->success('Tipo editado com sucesso');
        return $this->redirect(['controller' => 'Pages', 'action' => 'Settings']);
      }
      else{
        $this->Flash->error('Tipo não foi editado com sucesso');
      }
    }
    $this->set(compact('type'));
  }
  public function remove($id=null){
    $this->request->allowMethod(['post', 'delete']);
    $type = $this->Types->get($id);
    if($type){
      if($this->Types->delete($type)){
        $this->Flash->success('Tipo apagado com sucesso');
      }
      else{
        $this->Flash->error('Tipo não foi apagado com sucesso');
      }
    }    
    return $this->redirect(['controller' => 'Pages', 'action' => 'Settings']);
  }

  public function isAuthorized($user) {
    // Level 2, 1 ou 0 para poder acessar as configurações
    if($user['level'] <= 2){
      return true;
    }else{
      return false;
    }
  }
}
