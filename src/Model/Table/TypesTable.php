<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
class TypesTable extends Table
{
  public function initialize(array $config)
  {
    parent::initialize($config);
    $this->table('types');
    $this->displayField('description');
    $this->primaryKey('id');
    $this->addBehavior('Timestamp');
    $this->hasMany('Calendars', ['foreignKey' => 'type_id']);
  }
}
