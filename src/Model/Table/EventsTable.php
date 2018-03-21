<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EventsTable extends Table{
  public function initialize(array $config){
    parent::initialize($config);
    $this->hasMany('Schedules');
  }

  public function validationDefault(Validator $validator){
      $validator->add( 'code',  ['unique' => [ 'rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Esse código já está em uso.'] ] );
      return $validator;
  }
}
