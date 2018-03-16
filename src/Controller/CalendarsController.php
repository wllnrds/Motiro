<?php
namespace App\Controller;

class CalendarsController extends AppController{

  public function index(){
    $search = $this->request->getQuery('search');

    $calendars;
    if($search != null){
      $calendars = $this->Calendars->find('all', [
        'conditions' => ['OR' => [
          'name LIKE' => '%' . $search . '%',
          'code LIKE' => '%' . $search . '%'
          ]]
      ])->order(['type_id' => "ASC"]);
    }else{
      $calendars = $this->Calendars->find()->order(['type_id' => "ASC"])->all();
    }
    $this->set(compact('calendars'));

    $this->loadModel('Types');
    $types = $this->Types->find()->all();
    $_types = $this->Types->getArray();
    $this->set(compact('types'));
    $this->set(compact('_types'));
    $this->set(compact('search'));
  }

  public function add(){
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
    $types = $this->Calendars->Types->find('list')->all();
    $this->set(compact('calendar', 'types'));
    $this->set('_serialize', ['calendar']);
  }
  public function edit($id=null){
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
    $this->set(compact('calendar'));
  }

  public function load($id){
    $this->response->type('json');

    $color = ['#323232', '#007ef2', '#8700ff', '#f64200', '#323232'];
    $date_begin = $this->request->getQuery('start');
    $date_end = $this->request->getQuery('end');

    $calendar = $this->Calendars->get($id);
    $this->loadModel('Schedules');
    $schedules = $this->Schedules->getSchedulesByCalendar($calendar->id, $date_begin, $date_end);
    $json = [];
    foreach ($schedules as $schedule) {
      $json[] = [
        'title' => '[' . $schedule->event->code . '] '. $schedule->event->label . ' ' . $schedule->ordering,
        'start' => $schedule->begin->format('Y-m-d H:i:s'),
        'end' => $schedule->end->format('Y-m-d H:i:s'),
        'backgroundColor' => $color[$calendar->type_id]
      ];
    }

    $this->set(compact('json'));
    $this->set('_serialize', 'json');
  }
  public function getCalendars(){
    $this->loadModel('Types');
    $this->loadModel('Schedules');

    $name = $this->request->query['term'];
    $schedule_id = $this->request->query['scheduleid'];

    // para verificar se os calendários estão ocupados
    $begin;
    $end;

    if(isset($this->request->query['date'])){
      $_date = $this->request->query['date'];
      $_begin = $this->request->query['begin'];
      $_end = $this->request->query['end'];

      $begin = $_date . ' ' . $_begin;
      $end = $_date . ' ' . $_end;
    }

    $limit = 10;
    $results;

    if(!empty($name)){
      $results = $this->Calendars->find('all', [
          'conditions' => [ 'OR' => [
              'name LIKE' => '%' . $name . '%',
              'code LIKE' => '%' . $name . '%',
          ]]
      ])->order(['type_id' => 'DESC', 'name' => 'ASC'])->limit($limit);
    }else{
      if(!empty($schedule_id)){
        $this->loadModel('Schedules');
        $schedule = $this->Schedules->get( $schedule_id , ['contain' => ['Calendars']]);
        $results = $schedule->calendars;
      }
      else{
        $results = $this->Calendars->find('all', [
          'conditions' => [ 'OR' => [
              'name LIKE' => '%' . $name . '%',
              'code LIKE' => '%' . $name . '%',
          ]]])->order(['type_id' => 'DESC', 'name' => 'ASC'])->limit($limit);
      }
    }

    $types = $this->Types->getArray();
    $resultsArr = [];
    foreach ($results as $result) {
      $_class = $types[$result['type_id']];

      if(isset($this->request->query['date'])){
        $isfree = $this->Schedules->isFree($result['id'], $begin, $end);

        if(!$isfree){
          $_class .= ' busy';
        }
      }

      $resultsArr [] = [
        'value' => (string)$result['id'],
        'label' => '['.$result['code'].'] ' . $result['name'],
        'class' => $_class
      ];
    }

    $this->autoRender = false;
    $this->response->type('application/json');
    echo json_encode(['data' => $resultsArr]);
  }

  public function isAuthorized($user) {
    if(isset($user)){
      // Só level 2 pra baixo pode adicionar e excluir calendários
      if (in_array($this->request->getParam('action'), ['add', 'remove'])) {
        if($user['level'] <= 2){
          return true;
        }else{
          return false;
        }
      }

      // Só level 3 pra baixo pode editar
      if ($this->request->getParam('action') === 'edit') {
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
