<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deduction Entity
 *
 * @property int $id
 * @property float $amount
 * @property int $card_id
 * @property int $turnover_id
 * @property string $description
 *
 * @property \App\Model\Entity\Card $card
 * @property \App\Model\Entity\Turnover $turnover
 */
class Deduction extends Entity
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
        'amount' => true,
        'percentage' => true,
        'card_id' => true,
        'turnover_id' => true,
        'description' => true,
        'card' => true,
        'turnover' => true,
        'state' => true,
    ];
}
