<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use App\Model\Entity\Types;

class TypesTable extends Table
{
  public function initialize(array $config)
  {
    $this->hasMany('Calendars');
    $this->displayField('description');
  }

  public function getArray(){
    $_types = $this->find('all')->all();
    $types = [];

    foreach ($_types as $type) {
      $types[$type->id] = strtolower($type->slug);
    }

    return $types;
  }
}
