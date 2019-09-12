<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deductions Model
 *
 * @property \App\Model\Table\CardsTable|\Cake\ORM\Association\BelongsTo $Cards
 * @property \App\Model\Table\TurnoversTable|\Cake\ORM\Association\BelongsTo $Turnovers
 *
 * @method \App\Model\Entity\Deduction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Deduction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Deduction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Deduction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deduction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deduction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Deduction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Deduction findOrCreate($search, callable $callback = null, $options = [])
 */
class DeductionsTable extends Table
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

        $this->setTable('deductions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cards', [
            'foreignKey' => 'card_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Turnovers', [
            'foreignKey' => 'turnover_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->decimal('percentage')
            ->requirePresence('percentage', 'create')
            ->notEmptyString('percentage');

        $validator
        ->decimal('amount');
       
            
        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
        $rules->add($rules->existsIn(['card_id'], 'Cards'));
        $rules->add($rules->existsIn(['turnover_id'], 'Turnovers'));

        return $rules;
    }
}
