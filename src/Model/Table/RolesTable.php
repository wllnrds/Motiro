<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use App\Model\Entity\Roles;

class RolesTable extends Table
{
  public function initialize(array $config)
  {
    $this->hasMany('Users');
    $this->displayField('label');
  }

  public function getArray(){
    $_roles = $this->find('all')->all();
    $roles = [];

    foreach ($_roles as $role) {
      $roles[$role->id] = $role->label;
    }

    return $roles;
  }
}
