<?php
namespace App\Model\Table;

use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ChaletsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        
        $this->setTable('chalets');
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
            ->scalar('nombre_de_chambre')
            ->maxLength('nombre_de_chambre', 100)
            ->requirePresence('nombre_de_chambre', 'create')
            ->notEmptyString('nombre_de_chambre');

        $validator
            ->scalar('prix')
            ->maxLength('prix', 50)
            ->requirePresence('prix', 'create')
            ->notEmptyString('prix');

        

        return $validator;
    }
}