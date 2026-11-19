<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Voitures extends Entity
{
  protected $_accessible = [
    '*' => true,
    'code' => false,
  
  ];
}
