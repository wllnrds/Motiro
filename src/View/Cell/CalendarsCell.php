<?php

namespace App\View\Cell;

use Cake\View\Cell;

class CalendarsCell extends Cell
{
    public function display($calendar_id)
    {
      $this->loadModel('Schedules');
      $schedules = $this->Schedules->getSchedulesByCalendar($calendar_id);
      $this->set(compact('schedules'));

      $this->loadModel('Types');
      $types = $this->Types->getArray();
      $this->set(compact('types'));
    }

}
