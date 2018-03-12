<?php
namespace App\Controller;

use App\Controller;

class EventsController extends AppController
  {
    public function index(){
    $events = $this->Events->find()->all();
    $this->set(compact('events'));
  }

  public function add()
  {
    $event = $this->Events->newEntity();
    if($this->request->is('post')){
      $event = $this->Events->patchEntity($event, $this->request->data);
      if($this->Events->save($event)){
        $this->Flash->success('Evento cadastrado com sucesso');
        return $this->redirect(['action'=>'view', $event->id]);
      }
      else{
        $this->Flash->error('Erro ao cadastrar evento');
      }
    }
    $this->set(compact('event'));
  }

  public function edit($id=null)
  {
    $this->loadComponent('Paginator');
    $event = $this->Events->get($id);
    if($this->request->is(['post', 'put'])){
      $event = $this->Events->patchEntity($event, $this->request->data);
      if($this->Events->save($event)){
        $this->Flash->success('Evento editado com sucesso');
        return $this->redirect(['action' => 'index']);
      }
      else{
        $this->Flash->error('Evento não foi editado com sucesso');
      }
    }
    $this->set(compact('event'));
  }

  public function remove($id=null){
    $this->request->allowMethod(['post', 'delete']);
    $event = $this->Events->get($id);
    if($this->Events->delete($event))
    {
      $this->Flash->success('Evento apagado com sucesso');
    }
    else
    {
      $this->Flash->error('Evento não foi apagado com sucesso');
    }
    return $this->redirect(['action' => 'index']);
  }

  public function view($id = null){
    $event = $this->Events->get($id);
    // $this->loadModel('Schedules');
    $this->set(compact('event'));
  }
}
