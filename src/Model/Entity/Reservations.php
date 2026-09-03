<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Reservations extends Entity
{
    protected $_accessible = [
        'client_id' => true,
        'date_entree' => true,
        'date_sortie' => true,
        'montant' => true,
    ];
}
