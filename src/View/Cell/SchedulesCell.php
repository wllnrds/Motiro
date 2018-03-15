<?php

namespace App\View\Cell;

use Cake\View\Cell;

class SchedulesCell extends Cell
{
    public function display($date = -1)
    {
      $this->loadModel('Schedules');
      if($date == -1){
          $schedules = $this->Schedules->getSchedulesByDay();
      }else{
        $schedules = $this->Schedules->getSchedulesByDay(new \DateTime($date), new \DateTime($date));
      }
      $this->set(compact('schedules'));

      $this->loadModel('Types');
      $types = $this->Types->getArray();
      $this->set(compact('types'));
    }

}
