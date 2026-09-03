<?php
namespace App\Model\Table;

use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ReservationsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        
        $this->setTable('reservations');
        $this->setPrimaryKey(['client_id','date_entree','date_sortie','montant']);
        
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'modified' => 'always'
                ]
            ]
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('client_id')
            ->maxLength('client_id', 100)
            ->requirePresence('client_id', 'create')
            ->notEmptyString('client_id');

        $validator
            ->scalar('code_chalets')
            ->maxLength('code_chalets', 50)
            ->requirePresence('code_chalets', 'create')
            ->notEmptyString('code_chalets');

        $validator
            ->scalar('date_entree')
            ->maxLength('date_entree', 50)
            ->requirePresence('date_entree', 'create')
            ->notEmptyString('date_entree');
        $validator
            ->scalar('date_sortie')
            ->maxLength('date_sortie', 50)
            ->requirePresence('date_sortie', 'create')
            ->notEmptyString('date_sortie');
        $validator
            ->scalar('montant')
            ->maxLength('montant', 255)
            ->requirePresence('montant', 'create')
            ->notEmptyString('montant');

        return $validator;
    }
    
}
