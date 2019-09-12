<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Businesses Model
 *
 * @property \App\Model\Table\ManagersTable|\Cake\ORM\Association\BelongsTo $Managers
 * @property \App\Model\Table\VendorsTable|\Cake\ORM\Association\BelongsTo $Vendors
 *
 * @method \App\Model\Entity\Business get($primaryKey, $options = [])
 * @method \App\Model\Entity\Business newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Business[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Business|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Business saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Business patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Business[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Business findOrCreate($search, callable $callback = null, $options = [])
 */
class BusinessesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('businesses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Managers', [
            'foreignKey' => 'manager_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('id')
            ->maxLength('id', 50)
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('business_name')
            ->maxLength('business_name', 255)
            ->requirePresence('business_name', 'create')
            ->notEmptyString('business_name');

        $validator
            ->scalar('Description')
            ->maxLength('Description', 255)
            ->requirePresence('Description', 'create')
            ->notEmptyString('Description');

        $validator
            ->date('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmptyDate('created_at');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmptyString('created_by');

        $validator
            ->date('last_modified_at')
            ->requirePresence('last_modified_at', 'create')
            ->notEmptyDate('last_modified_at');

        $validator
            ->integer('last_modified_by')
            ->requirePresence('last_modified_by', 'create')
            ->notEmptyString('last_modified_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['manager_id'], 'Managers'));
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));

        return $rules;
    }
}
