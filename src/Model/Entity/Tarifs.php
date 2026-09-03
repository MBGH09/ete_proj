<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class tarifs extends Entity
{
    protected $_accessible = [
        'datedebut' => true,
        'datefin' => true,
        'Prix' => true,
    ];
}