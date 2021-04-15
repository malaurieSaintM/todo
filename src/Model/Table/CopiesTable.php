<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Copies Model
 *
 * @property \App\Model\Table\NewlistsTable&\Cake\ORM\Association\BelongsTo $Newlists
 * @property \App\Model\Table\CopiesTable&\Cake\ORM\Association\BelongsTo $Copies
 * @property \App\Model\Table\CopiesTable&\Cake\ORM\Association\HasMany $Copies
 *
 * @method \App\Model\Entity\Copy newEmptyEntity()
 * @method \App\Model\Entity\Copy newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Copy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Copy get($primaryKey, $options = [])
 * @method \App\Model\Entity\Copy findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Copy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Copy[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Copy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Copy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Copy[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Copy[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Copy[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Copy[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CopiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('copies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Newlists', [
            'foreignKey' => 'newlist_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Copies', [
            'foreignKey' => 'copy_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Copies', [
            'foreignKey' => 'copy_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['newlist_id'], 'Newlists'), ['errorField' => 'newlist_id']);
        $rules->add($rules->existsIn(['copy_id'], 'Copies'), ['errorField' => 'copy_id']);

        return $rules;
    }
}
