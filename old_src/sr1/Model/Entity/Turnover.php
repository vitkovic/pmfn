<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Turnover Entity
 *
 * @property int $id
 * @property int $Type
 * @property float $Amount
 * @property float $Deduction
 * @property string $Description
 * @property \Cake\I18n\FrozenDate $created_at
 * @property string $business_id
 *
 * @property \App\Model\Entity\Business $business
 * @property \App\Model\Entity\Deduction[] $deductions
 */
class Turnover extends Entity
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
        'Type' => true,
        'Amount' => true,
        'Deduction' => true,
        'Description' => true,
        'created_at' => true,
        'business_id' => true,
        'business' => true,
        'deductions' => true
    ];
}
