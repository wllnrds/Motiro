<?php
namespace App\Controller;

class SchedulesController extends AppController
{

    public function index(){
    $schedules = $this->Schedules->find();
    $this->set(compact('schedules'));
  }

  public function view($id = null){
    $schedule = $this->Schedules->get($id);
    $this->set(['result' => $schedule]);
  }

  public function add(){
    $this->loadComponent('Paginator');
    $schedules = $this->Paginator->paginate($this->Schedules->find());

    //$schedule = $this->Schedules->get($id);
    $schedule = $this->Schedules->newEntity();
    if($this->request->is(['post', 'put'])){
      $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
      $this->Schedules->save($schedule);
    }
    $this->set(compact('schedule'));
  }

  public function edit($id){
    $this->loadComponent('Paginator');
    $schedules = $this->Paginator->paginate($this->Schedules->find());

    $schedule = $this->Schedules->get($id);
    //$schedule = $this->Schedules->newEntity();
    if($this->request->is(['post', 'put'])){
      $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
      $this->Schedules->save($schedule);
    }
    $this->set(compact('schedule'));
  }

  public function remove($id){
    $entity = $this->Schedules->get($id);
    $result = $this->Schedules->delete($entity);
  }

}
