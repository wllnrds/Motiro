<?php
namespace App\Controller;

class EventsController extends AppController
{

    public function index(){
    $events = $this->Events->find();
    $this->set(compact('events'));
  }

  public function view($id = null){
    $event = $this->Events->get($id);
    $this->set(['result' => $event]);
  }

  public function add(){
    $this->loadComponent('Paginator');
    $events = $this->Paginator->paginate($this->Events->find());

    //$event = $this->Events->get($id);
    $event = $this->Events->newEntity();
    if($this->request->is(['post', 'put'])){
      $event = $this->Events->patchEntity($event, $this->request->getData());
      $this->Events->save($event);
    }
    $this->set(compact('event'));
  }

  public function edit($id){
    $this->loadComponent('Paginator');
    $events = $this->Paginator->paginate($this->Events->find());

    $event = $this->Events->get($id);
    //$event = $this->Events->newEntity();
    if($this->request->is(['post', 'put'])){
      $event = $this->Events->patchEntity($event, $this->request->getData());
      $this->Events->save($event);
    }
    $this->set(compact('event'));
  }

  public function remove($id){
    $entity = $this->Events->get($id);
    $result = $this->Events->delete($entity);
  }

}
