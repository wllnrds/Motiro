<?php
namespace App\Controller;

use App\Controller;

class EventsController extends AppController{
  public function index(){
    $search = $this->request->getQuery('search');

    $events;
    if($search != null){
      $events = $this->Events->find('all', [
        'conditions' => ['OR' => [
          'code LIKE' => '%' . $search . '%',
          'label LIKE' => '%' . $search . '%'
          ]]
      ]);
    }else{
      $events = $this->Events->find()->all();
    }
    $this->set(compact('events'));
    $this->set(compact('search'));
  }
  public function add(){
    $event = $this->Events->newEntity();
    if($this->request->is('post')){
      $event = $this->Events->patchEntity($event, $this->request->data);
      if($this->Events->save($event)){
        $this->Flash->success('Evento cadastrado com sucesso');
        return $this->redirect(['action'=>'edit', $event->id]);
      }
      else{
        $this->Flash->error('Erro ao cadastrar evento');
      }
    }
    $this->set(compact('event'));
  }
  public function edit($id, $schedule_id = null){
    $this->loadModel('Schedules');

    $event = $this->Events->get($id);

    $_new = true;
    $scheduledata;

    if($schedule_id != null){
      $scheduledata = $this->Schedules->get($schedule_id);
      if($scheduledata != null){
        $scheduledata->date = $scheduledata->begin->format('Y-m-d');
        $scheduledata->begin = $scheduledata->begin->format('H:i');
        $scheduledata->end = $scheduledata->end->format('H:i');
        $scheduledata->calendars = ['_ids' => $scheduledata->calendars_ids];
        $_new = false;
      }
    }else{
        $scheduledata = $this->Schedules->newEntity();
    }

    $this->set(compact('event'));
    $this->set(compact('scheduledata'));

    if($this->request->is(['put', 'post'])){
      if(isset($this->request->data['editingevent'])){
        $event = $this->Events->patchEntity($event, $this->request->data);
        if($this->Events->save($event)){
          $this->Flash->success('Evento editado com sucesso');
          return $this->redirect(['action' => 'edit', $id]);
        }
        else{
          $this->Flash->error('Evento não foi editado com sucesso');
        }
      }

      if(isset($this->request->data['event_id'])){
        $data = $this->request->data;


        $_date = $data['date'];
        $_begin = $data['begin'];
        $_end = $data['end'];

        $data['begin'] = \DateTime::createFromFormat('Y-m-d H:i', $_date . ' ' . $_begin);
        $data['end'] = \DateTime::createFromFormat('Y-m-d H:i', $_date . ' ' . $_end);

        $nextday = \DateTime::createFromFormat('Y-m-d', $_date);
        $nextday->add(new \DateInterval('P1D'));
        $this->request->data['date'] = $nextday->format('Y-m-d');

        $scheduledata = $this->Schedules->patchEntity($scheduledata, $data);

        if($_new){
          if($this->Schedules->save($scheduledata)){
            $this->Flash->success('Agendamento cadastrado com sucesso');
          }
          else{
            $this->Flash->error('Erro ao cadastrar agendamento');
          }
        }else{
          if($this->Schedules->save($scheduledata)){
            $this->Flash->success('Agendamento editado com sucesso');
            return $this->redirect(['action'=>'edit', $event->id]);
          }
          else{
            $this->Flash->error('Erro ao editar agendamento');
          }
        }
      }
    }
  }
  public function view($id = null){
    $event = $this->Events->get($id);
    $this->set(compact('event'));
  }
  public function editschedule($event_id, $schedule_id){
    return $this->redirect(['action'=>'edit', $event_id, $schedule_id]);
  }
  public function removeschedule($schedule_id, $event_id){
    if($schedule_id != null){
      $this->request->allowMethod(['post', 'delete']);

      $this->loadModel('Schedules');
      $schedule = $this->Schedules->get($schedule_id);

      if($schedule){
        if($this->Schedules->delete($schedule)){
          $this->Flash->success('Agendamento excluido com sucesso');
        }
        else{
          $this->Flash->error('O agendamento não foi excluido');
        }
      }
    }else{
      $this->Flash->error('Não há agendamento para ser excluido');
    }

    return $this->redirect(['action'=>'edit', $event_id]);
  }
  public function remove($id=null){
    $this->request->allowMethod(['post', 'delete']);
    $event = $this->Events->get($id);
    if($this->Events->delete($event))    {
      $this->Flash->success('Evento excluido com sucesso');
    }
    else    {
      $this->Flash->error('Evento não foi excluido');
    }
    return $this->redirect(['action' => 'index']);
  }
  public function archive($id){
    $this->request->allowMethod(['post', 'delete']);
    $event = $this->Events->get($id);
    $event->archived = true;
    if($this->Events->save($event)){ $this->Flash->success('Evento arquivado com sucesso'); }
    else{ $this->Flash->error('Evento não foi arquivado'); }
    return $this->redirect(['action' => 'index']);
  }
  public function unarchive($id){
    $this->request->allowMethod(['post', 'delete']);
    $event = $this->Events->get($id);
    $event->archived = false;
    if($this->Events->save($event)){ $this->Flash->success('Evento desarquivado com sucesso'); }
    else{ $this->Flash->error('Evento não foi desarquivado'); }
    return $this->redirect(['action' => 'index']);
  }

  public function isAuthorized($user) {
    if(isset($user)){
      // Só level 3 pra baixo pode gerenciar os eventos, os demais só podem visualizar
      if (in_array($this->request->getParam('action'), ['unarchive', 'archive', 'remove', 'add', 'edit', 'removeschedule', 'editschedule'])) {
        if($user['level'] <= 3){
          return true;
        }else{
          return false;
        }
      }

      if ($this->request->getParam('action') === 'index') {
        if($user['level'] < 10){
          return true;
        }else{
          return false;
        }
      }
    }
    return parent::isAuthorized($user);
  }
}
