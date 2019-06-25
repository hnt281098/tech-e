<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Information Entity
 *
 * @property int $id
 * @property string|null $introduce
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $youtube
 * @property int|null $phone
 * @property string|null $mail
 * @property string|null $logo
 * @property string|null $background
 * @property string|null $thumbnail1
 * @property string|null $thumbnail2
 */
class Information extends Entity
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
        'id' => false,
    ];
}
