<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{
  public function initialize(array $config){
    parent::initialize($config);
    $this->belongsTo('Roles');
  }

  public function validationDefault(Validator $validator){
      $validator->add( 'username',  ['unique' => [ 'rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Esse usuário já está em uso.'] ] );
      return $validator;
  }
}
