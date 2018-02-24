<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
class UsersTable extends Table
{
    public function initialize(array $config)
    {
      parent::initialize($config);

      $this->table('users');
      $this->displayField('id');
      $this->primaryKey('id');

      $this->addBehavior('Timestamp');

      $this->belongsTo('Roles', [
          'foreignKey' => 'roles_id',
          'joinType' => 'INNER'
      ]);

    }
}
