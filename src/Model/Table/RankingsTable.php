<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rankings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Countries
 * @property \Cake\ORM\Association\BelongsTo $Ranks
 *
 * @method \App\Model\Entity\Ranking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ranking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ranking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ranking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ranking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ranking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ranking findOrCreate($search, callable $callback = null, $options = [])
 */
class RankingsTable extends Table
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

        $this->setTable('rankings');
        $this->setDisplayField('country_id');
        $this->setPrimaryKey(['country_id', 'rank_id']);

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ranks', [
            'foreignKey' => 'rank_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['rank_id'], 'Ranks'));

        return $rules;
    }
}
