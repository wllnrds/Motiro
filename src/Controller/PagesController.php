<?php
namespace App\Controller;

class PagesController extends AppController
{
    public function Home(){
      $this->loadModel('Schedules');
      $this->loadModel('Types');

      $start = new \DateTime('now');
      $end = new \DateTime('now');

      $start->setTime( 0, 0 );
      $end->setTime( 23, 59 );

      $schedules = $this->Schedules->find('all' , ['contain' => ['Calendars', 'Events']])
        ->where([
          'Schedules.begin >' => $start,
          'Schedules.begin <' => $end,
        ])->all();

      $_types = $this->Types->find('all')->all();
      $types;

      foreach ($_types as $type) {
        $types[$type->id] = strtolower($type->slug);
      }

      $this->set(compact('schedules'));
      $this->set(compact('types'));
    }
}
