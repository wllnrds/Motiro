<?php
namespace App\Controller;

class CalendarsController extends AppController
{

    public function index(){
    $calendars = $this->Calendars->find();
    $this->set(compact('calendars'));
  }

  public function view($id = null){
    $calendar = $this->Calendars->get($id);
    $this->set(['result' => $calendar]);
  }

  public function add(){
    $this->loadComponent('Paginator');
    $calendars = $this->Paginator->paginate($this->Calendars->find());

    //$calendar = $this->Calendars->get($id);
    $calendar = $this->Calendars->newEntity();
    if($this->request->is(['post', 'put'])){
      $calendar = $this->Calendars->patchEntity($calendar, $this->request->getData());
      $this->Calendars->save($calendar);
    }
    $this->set(compact('calendar'));
  }

  public function edit($id){
    $this->loadComponent('Paginator');
    $calendars = $this->Paginator->paginate($this->Calendars->find());

    $calendar = $this->Calendars->get($id);
    //$calendar = $this->Calendars->newEntity();
    if($this->request->is(['post', 'put'])){
      $calendar = $this->Calendars->patchEntity($calendar, $this->request->getData());
      $this->Calendars->save($calendar);
    }
    $this->set(compact('calendar'));
  }

  public function remove($id){
    $entity = $this->Calendars->get($id);
    $result = $this->Calendars->delete($entity);
  }

}
