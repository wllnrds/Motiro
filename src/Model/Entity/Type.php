<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;

class Type extends Entity
{
  protected $_virtual = ['slug'];
  protected $_accessible = [
      '*' => true
  ];

  protected function _getSlug(){
    if(isset($this->_properties['description'])){
      return Inflector::slug($this->_properties['description']);
    }
  }
}
