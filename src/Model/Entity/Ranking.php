<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ranking Entity
 *
 * @property int $country_id
 * @property int $rank_id
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Rank $rank
 */
class Ranking extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'country_id' => false,
        'rank_id' => false
    ];
}
