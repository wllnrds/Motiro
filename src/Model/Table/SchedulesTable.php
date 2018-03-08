<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
class SchedulesTable extends Table
{
    public function initialize(array $config)
    {
      parent::initialize($config);

      $this->table('schedules');
      $this->displayField('id');
      $this->primaryKey('id');

      $this->addBehavior('Timestamp');

      $this->belongsTo('Events', [
          'foreignKey' => 'events_id',
          'joinType' => 'INNER'
      ]);

      $this->belongsToMany('Calendars',[
        'joinTable' => 'schedules_calendars',
        'foreignKey' => 'schedule_id',
        'targetForeignKey'=>'calendar_id'
      ]);



    }
}
