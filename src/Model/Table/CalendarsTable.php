<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CalendarsTable extends Table{
  public function initialize(array $config){
    parent::initialize($config);
    $this->belongsTo('Types');
    $this->belongsToMany('Schedules', [
      'through' => 'SchedulesCalendars',
    ]);
  }

  public function validationDefault(Validator $validator){
      $validator->add( 'code',  ['unique' => [ 'rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Esse código já está em uso.'] ] );
      return $validator;
  }
}
