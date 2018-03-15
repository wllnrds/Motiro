<?php
namespace App\Controller;

class PagesController extends AppController
{
    public function Home(){
      $date = new \DateTime('now');
      $this->set(compact('date'));
    }
    public function Ver($arg){
      $date = new \DateTime($arg);
      $this->set(compact('date'));
      $this -> render('/Pages/home');
    }
    public function Settings(){
        $this->loadModel('Roles');
        $roles = $this->Roles
          ->find()
          ->order(['level' => 'ASC'])
          ->all();
        $this->set(compact('roles'));

        $this->loadModel('Types');
        $types = $this->Types->find()->all();
        $this->set(compact('types'));
    }

    public function teste(){
      $calendar_id = 4; // Willian
      $inicio = '03/16/2018 10:00:00';
      $fim = '03/16/2018 12:00:00';

      $this->loadModel('Calendars');
      $this->loadModel('Schedules');

      $begin_date = new \DateTime($inicio);
      $end_date = new \DateTime($fim);

      $schedules = $this->Schedules->find('all', ['contains' => 'Calendars'])
        ->leftJoinWith('Calendars')
        ->where([
          'Schedules.begin >=' => $begin_date,
          'Schedules.end >=' => $begin_date
        ])->orWhere([
          'Schedules.begin >=' => $end_date,
          'Schedules.end >=' => $end_date
        ])->andWhere(['Calendars.id' => $calendar_id])
        ->order(['Schedules.begin'=>"ASC"])->all();

        debug($schedules);
    }

    public function isAuthorized($user) {
      if(isset($user)){
        if ($this->request->getParam('action') === 'settings') {
          if($user['level'] <= 1){
            return true;
          }else{
            return false;
          }
        }
      }
      return parent::isAuthorized($user);
    }
}
