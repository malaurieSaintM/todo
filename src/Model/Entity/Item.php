<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $todolist_id
 * @property string $content
 * @property \Cake\I18n\FrozenDate|null $deadline
 * @property bool $status
 *
 * @property \App\Model\Entity\Todolist $todolist
 */
class Item extends Entity
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
        'todolist_id' => true,
        'content' => true,
        'deadline' => true,
        'status' => true,
        'todolist' => true,
    ];
}
