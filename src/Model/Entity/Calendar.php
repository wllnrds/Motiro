<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Calendar extends Entity
{
    protected $_accessible = [
        '*' => true
    ];
}
