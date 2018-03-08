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
  }
}
