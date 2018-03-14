<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Event extends Entity
{
    protected $_accessible = [
        '*' => true
    ];

    protected function _getCounter(){
      $id = $this->_properties['id'];
      $data = TableRegistry::get('Schedules');
      $result = $data->find()->where(['Schedules.event_id' => $id])->all();
      return $result->count();
    }
}
