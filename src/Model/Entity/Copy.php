<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Copy Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $newlist_id
 * @property int $copy_id
 *
 * @property \App\Model\Entity\Newlist $newlist
 * @property \App\Model\Entity\Copy[] $copies
 */
class Copy extends Entity
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
        'created' => true,
        'modified' => true,
        'newlist_id' => true,
        'copy_id' => true,
        'newlist' => true,
        'copies' => true,
    ];
}
