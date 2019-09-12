<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Business Entity
 *
 * @property string $id
 * @property string $business_name
 * @property string $Description
 * @property \Cake\I18n\FrozenDate $created_at
 * @property int $created_by
 * @property \Cake\I18n\FrozenDate $last_modified_at
 * @property int $last_modified_by
 * @property string $manager_id
 * @property string $vendor_id
 *
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Turnover[] $turnovers
 */
class Business extends Entity
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
        'business_name' => true,
        'Description' => true,
        'created_at' => true,
        'created_by' => true,
        'last_modified_at' => true,
        'last_modified_by' => true,
        'manager_id' => true,
        'vendor_id' => true,
        'manager' => true,
        'vendor' => true,
        'turnovers' => true
    ];
}
