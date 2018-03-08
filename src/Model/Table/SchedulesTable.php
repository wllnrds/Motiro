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
}
