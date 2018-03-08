<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Schedule extends Entity
{
    protected $_accessible = [ '*' => true ];
    protected $_virtual = [];

    protected function _getOrdering()
    {
        $event_id = $this->_properties['event_id'];

        $data = TableRegistry::get('Schedules');
        $result = $data->find()
          ->select(['id', 'begin'])
          ->where(['event_id' => $event_id])
          ->order(['begin' => 'ASC'])->all();


        return '(' . $this->indexOf($result) . '/' . sizeof($result) . ')';
    }

    protected function _getActive()
    {
      $now = new \DateTime('now');
      $start = $this->_properties['begin'];
      $end = $this->_properties['end'];

      if ($start < $now){
        if($end > $now){
          return 'active';
        }else{
          return 'ended';
        }
      }
      return 'waiting';
    }


    private function indexOf($data){
      $index = 0;
      foreach($data as $item){
        $index++;

        if($item->id == $this->_properties['id']){
          return $index;
        }
      }

      return -1;
    }

}
