<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;

class Type extends Entity
{
  protected $_virtual = ['slug'];

  protected function _getSlug()
  {
      return Inflector::slug($this->_properties['description']);;
  }
}
