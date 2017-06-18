<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property \Cake\I18n\FrozenTime $last_login
 * @property int $login_count
 * @property int $role_id
 * @property int $auth_role_id
 * @property int $section_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $county
 * @property string $postcode
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $osm_user_id
 * @property string $osm_secret
 * @property int $osm_linked
 * @property \Cake\I18n\FrozenTime $osm_linkdate
 * @property int $osm_current_term
 * @property \Cake\I18n\FrozenTime $osm_term_end
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\AuthRole $auth_role
 * @property \App\Model\Entity\Section $section
 * @property \App\Model\Entity\OsmUser $osm_user
 */
class User extends Entity
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
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
