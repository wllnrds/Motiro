<?php

namespace App\View\Cell;

use Cake\View\Cell;

class EventsListCell extends Cell
{

    public function display($event_id)
    {
      $this->loadModel('Schedules');
      $schedules = $this->Schedules->getSchedulesByEvent($event_id);
      $this->set(compact('schedules'));

      $this->loadModel('Types');
      $types = $this->Types->getArray();
      $this->set(compact('types'));
    }

}
