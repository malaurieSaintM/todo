<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $sender_id
 * @property int $recever_id
 * @property string $content
 * @property string|null $subject
 * @property \Cake\I18n\FrozenTime|null $read_at
 *
 * @property \App\Model\Entity\Sender $sender
 * @property \App\Model\Entity\Recever $recever
 */
class Message extends Entity
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
        'sender_id' => true,
        'recever_id' => true,
        'content' => true,
        'subject' => true,
        'read_at' => true,
        'sender' => true,
        'recever' => true,
    ];
}
