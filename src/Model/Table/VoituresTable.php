<?php
namespace App\Model\Table;

use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class VoituresTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        
        $this->setTable('voitures');
        $this->setDisplayField('name');
        $this->setPrimaryKey('code');
        
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
            ->scalar('nombre_de_places')
            ->maxLength('nombre_de_places', 100)
            ->requirePresence('nombre_de_places', 'create')
            ->notEmptyString('nombre_de_places');

        $validator
            ->scalar('prix')
            ->maxLength('prix', 50)
            ->requirePresence('prix', 'create')
            ->notEmptyString('prix');

        

        return $validator;
    }
}
