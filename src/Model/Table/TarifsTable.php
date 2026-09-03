<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TarifsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        
        $this->setTable('tarifs');
        // Match the exact order from your database structure
        $this->setPrimaryKey(['datedebut', 'datefin', 'Prix']);
        
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->date('datedebut')
            ->requirePresence('datedebut', 'create')
            ->notEmptyDate('datedebut');

        $validator
            ->date('datefin')
            ->requirePresence('datefin', 'create')
            ->notEmptyDate('datefin');

        $validator
            ->integer('Prix')
            ->requirePresence('Prix', 'create')
            ->notEmptyString('Prix');

        return $validator;
    }
}
