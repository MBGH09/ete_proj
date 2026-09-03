<?php
namespace App\Model\Table;

use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        
        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('login')
            ->maxLength('login', 50)
            ->requirePresence('login', 'create')
            ->notEmptyString('login');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 255)
            ->allowEmptyString('adresse');

        return $validator;
    }

   /* public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->isNew() && !empty($entity->password)) {
            $entity->password = password_hash($entity->password, PASSWORD_DEFAULT);
        }
        return true;
    }*/
}
