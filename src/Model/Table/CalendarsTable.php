<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
class CalendarsTable extends Table
{
    public function initialize(array $config)
    {
      parent::initialize($config);
      $this->table('calendars');
      $this->displayField('name');
      $this->primaryKey('id');
      $this->addBehavior('Timestamp');
      $this->belongsTo('Types', [
          'foreignKey' => 'types_id',
          'joinType' => 'INNER'
      ]);
    }
}
