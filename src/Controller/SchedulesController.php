<?php
namespace App\Controller;

class SchedulesController extends AppController
  {
    public function index(){
    $schedules = $this->Schedules->find()->all();
    $this->set(compact('schedules'));
  }

  public function add()
  {
    $schedule = $this->Schedules->newEntity();
    if($this->request->is('post')){
      $schedule = $this->Schedules->patchEntity($schedule, $this->request->data);
      if($this->Schedules->save($schedule)){
        $this->Flash->success('Agendamento cadastrado com sucesso');
        return $this->redirect(['action'=>'index']);
      }
      else{
        $this->Flash->error('Erro ao cadastrar agendamento');
      }
    }
    $events = $this->Schedules->Events->find('list', ['limit'=>200]);
    $calendars = $this->Schedules->Calendars->find('list');

    $this->set(compact('calendars', 'calendars'));
    $this->set(compact('schedule', 'events'));
    $this->set('_serialize', ['schedule']);
  }

  public function edit($id=null)
  {
    $this->loadComponent('Paginator');
    $schedule = $this->Schedules->get($id);
    if($this->request->is(['post', 'put'])){
      $schedule = $this->Schedules->patchEntity($schedule, $this->request->data);
      if($this->Schedules->save($schedule)){
        $this->Flash->success('Agendamento editado com sucesso');
        return $this->redirect(['action' => 'index']);
      }
      else{
        $this->Flash->error('Agendamento não foi editado com sucesso');
      }
    }
    $events = $this->Schedules->Events->find('list', ['limit'=>200]);
    $this->set(compact('schedule', 'schedules'));
    $this->set('_serialize', ['schedule']);
  }

  public function remove($id=null){
    $this->request->allowMethod(['post', 'delete']);
    $schedule = $this->Schedules->get($id);
    if($this->Schedules->delete($schedule))
    {
      $this->Flash->success('Agendamento apagado com sucesso');
    }
    else
    {
      $this->Flash->error('Agendamento não foi apagado com sucesso');
    }
    return $this->redirect(['action' => 'index']);
  }

  public function view($id = null){
    $schedule = $this->Schedules->get($id);
    $this->set(['result' => $schedule]);
  }
}
