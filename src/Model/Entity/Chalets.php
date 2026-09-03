<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Chalets extends Entity
{
  protected $_accessible = [
    '*' => true,
    'code' => false,
  
  ];
}