<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SchedulesTable extends Table
{
    public function initialize(array $config)
    {
      $this->belongsTo('Events');
      $this->belongsToMany('Calendars', [
        'through' => 'SchedulesCalendars',
      ]);
    }

    public function getSchedulesByEvent($event_id){
      $schedules = $this->find('all' , ['contain' => ['Calendars', 'Events']])
        ->leftJoinWith('Events')
        ->where([ 'Events.id' => $event_id ])
        ->order(['Schedules.begin'=>"ASC"])->all();

      return $schedules;
    }
    public function getSchedulesByCalendar($calendar_id, $begin_date = null, $end_date = null){
      if(!$begin_date){
        $begin_date = new \DateTime("now");
        $begin_date->modify('first day of this month')->setTime(0,0,0);
      }

      if(!$end_date){
        $end_date = new \DateTime("now");
        $end_date->modify('last day of this month')->setTime(23,59,59);
      }

      $schedules = $this->find('all' , ['contain' => ['Calendars', 'Events']])
        ->leftJoinWith('Calendars')
        ->where([
          'Calendars.id' => $calendar_id,
          'Schedules.begin >=' => $begin_date,
          'Schedules.end <=' => $end_date
        ])
        ->order(['Schedules.begin'=>"ASC"])->all();

      return $schedules;
    }
    public function getSchedulesByDay($begin_date = null, $end_date = null){
      if(!$begin_date){
        $begin_date = new \DateTime("now");
        $begin_date->setTime(0,0,0);
      }else{
        $begin_date = $this->_dating($begin_date);
      }

      if(!$end_date){
        $end_date = new \DateTime("now");
        $end_date->setTime(23,59,59);
      }else{
        $end_date = $this->_dating($end_date, true);
      }

      $schedules = $this->find('all' , ['contain' => ['Calendars', 'Events']])
        ->where([
          'Schedules.begin >=' => $begin_date,
          'Schedules.end <=' => $end_date
         ])
        ->order(['Schedules.begin'=>"ASC"])->all();

      return $schedules;
    }

    private function _dating($date, $end_day = false){
      if(!$end_day){ $date->setTime(0,0,0); }
      else{ $date->setTime(23,59,59); }

      return $date;
    }
}
