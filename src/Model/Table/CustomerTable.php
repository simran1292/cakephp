<?php
namespace App\Model\table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class OrdersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('FirstName')
            ->requirePresence('FirstName')
            ->notEmpty('LastName')
            ->requirePresence('LastName')
            ->notEmpty('Pin')
            ->requirePresence('Pin')
            
            ->notEmpty('Address')
            ->requirePresence('Address')
            
            ->notEmpty('City')
            ->requirePresence('City')
            
            ->notEmpty('Email')
            ->requirePresence('Email')
            
            ->notEmpty('PhoneNo')
            ->requirePresence('PhoneNo');
        
           
        
        return $validator;
    }
        public function isOwnedBy($customersId, $userId)
         {
            return $this->exists(['id' => $customersId, 'user_id' => $userId]);
        }
}
?>