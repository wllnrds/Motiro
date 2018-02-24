<?php
namespace App\Controller;

class CalendarsController extends AppController
  {
    public function index(){
    $calendarios = $this->Calendars->find()->all();
    $this->set(compact('calendarios'));
  }

  public function add()
  {
    $calendar = $this->Calendars->newEntity();
    if($this->request->is('post')){
      $calendar = $this->Calendars->patchEntity($calendar, $this->request->data);
      if($this->Calendars->save($calendar)){
        $this->Flash->success('Calendário cadastrado com sucesso');
        return $this->redirect(['action'=>'index']);
      }
      else{
        $this->Flash->error('Erro ao cadastrar calendário');
      }
    }
    $types = $this->Calendars->Types->find('list', ['limit'=>200]);
    $this->set(compact('calendar', 'types'));
    $this->set('_serialize', ['calendar']);
  }

  public function edit($id=null)
  {
    $this->loadComponent('Paginator');
    $calendar = $this->Calendars->get($id);
    if($this->request->is(['post', 'put'])){
      $calendar = $this->Calendars->patchEntity($calendar, $this->request->data);
      if($this->Calendars->save($calendar)){
        $this->Flash->success('Calendário editado com sucesso');
        return $this->redirect(['action' => 'index']);
      }
      else{
        $this->Flash->error('Calendário não foi editado com sucesso');
      }
    }
    $types = $this->Calendars->Types->find('list', ['limit'=>200]);
    $this->set(compact('calendar', 'types'));
    $this->set('_serialize', ['calendar']);
  }

  public function remove($id=null){
    $this->request->allowMethod(['post', 'delete']);
    $calendar = $this->Calendars->get($id);
    if($this->Calendars->delete($calendar))
    {
      $this->Flash->success('Calendário apagado com sucesso');
    }
    else
    {
      $this->Flash->error('Calendário não foi apagado com sucesso');
    }
    return $this->redirect(['action' => 'index']);
  }

  public function view($id = null){
    $calendar = $this->Calendars->get($id);
    $this->set(['result' => $calendar]);
  }
}
