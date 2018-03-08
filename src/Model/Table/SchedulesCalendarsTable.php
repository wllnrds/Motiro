<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
class SchedulesCalendarsTable extends Table
{
  public function initialize(array $config)
  {
    $this->belongsTo('Schedules');
    $this->belongsTo('Calendars');
  }
}
