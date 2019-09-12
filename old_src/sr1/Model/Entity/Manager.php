<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Manager Entity
 *
 * @property string $id
 * @property string $First_Name
 * @property string $Last_Name
 * @property \Cake\I18n\FrozenDate $created_at
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Business[] $businesses
 */
class Manager extends Entity
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
		'id' => true,
        'First_Name' => true,
        'Last_Name' => true,
        'created_at' => true,
        'user_id' => true,
        'user' => true,
        'businesses' => true
    ];
}
