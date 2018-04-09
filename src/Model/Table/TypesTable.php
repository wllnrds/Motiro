<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use App\Model\Entity\Types;
use App\Model\Entity\Calendars;

class TypesTable extends Table{
  public function initialize(array $config){
    $this->hasMany('Calendars');
    $this->displayField('description');
  }

  public function getArray(){
    $_types = $this->find('all')->all();

    $types = [];

    foreach ($_types as $type) {
      $_type = new \stdClass();
      $_type->id = $type->id;
      $_type->description = $type->description;
      $_type->slug = $type->slug;
      $_type->count = $this->Calendars->find('all')->where(['type_id'=>$type->id])->count();

      $types[$type->id] = $_type;
    }

    return $types;
  }
}
