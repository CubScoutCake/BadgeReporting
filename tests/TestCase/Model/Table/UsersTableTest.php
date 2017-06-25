<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.roles',
        'app.auth_roles',
        'app.sections',
        'app.scout_groups',
        'app.districts',
        'app.section_types',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::get('Users', $config);

        $now = new Time('2017-06-18 22:05:00');
        Time::setTestNow($now);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $frozen = new FrozenTime('2017-06-18 22:05:00');

        $query = $this->Users->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 1,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen,
            ],
            [
                'id' => 2,
                'username' => 'User2',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'User2',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 1,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $frozen = new FrozenTime('2017-06-18 22:05:00');

        $badData = [
            'id' => 3,
            'username' => null,
            'last_login' => $frozen,
            'login_count' => 1,
            'role_id' => null,
            'auth_role_id' => null,
            'section_id' => null,
            'first_name' => null,
            'last_name' => null,
            'email' => null,
            'password' => null,
            'phone' => null,
            'address_1' => null,
            'address_2' => null,
            'city' => null,
            'county' => null,
            'postcode' => 'Lorem ',
            'osm_user_id' => null,
            'osm_secret' => null,
            'osm_linked' => null,
            'osm_linkdate' => null,
            'osm_current_term' => null,
            'osm_term_end' => null,
        ];

        $goodData = [
            'id' => 4,
            'username' => 'User3',
            'last_login' => $frozen,
            'login_count' => 1,
            'role_id' => 1,
            'auth_role_id' => 1,
            'section_id' => 1,
            'first_name' => 'Lorem dolor sit amet',
            'last_name' => 'Lorem ipsum sit amet',
            'email' => 'user@user.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'address_1' => 'Lorem ipsum dolor sit amet',
            'address_2' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ',
            'osm_user_id' => 2,
            'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'osm_linked' => 1,
            'osm_linkdate' => $frozen,
            'osm_current_term' => 1,
            'osm_term_end' => $frozen
        ];

        $expected = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 1,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen,
            ],
            [
                'id' => 2,
                'username' => 'User2',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'User2',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 1,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen
            ],
            [
                'id' => 4,
                'username' => 'User3',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem dolor sit amet',
                'last_name' => 'Lorem ipsum sit amet',
                'email' => 'user@user.com',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 2,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen
            ],
        ];

        $badEntity = $this->Users->newEntity($badData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Users->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->Users->save($badEntity));
        $this->assertNotFalse($this->Users->save($goodEntity));

        $query = $this->Users->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $frozen = new FrozenTime('2017-06-18 22:05:00');

        $duplicateUsernameData = [
            'id' => 3,
            'username' => 'User2',
            'last_login' => $frozen,
            'login_count' => 1,
            'role_id' => 1,
            'auth_role_id' => 1,
            'section_id' => 1,
            'first_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'email' => 'user@email.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'address_1' => 'Lorem ipsum dolor sit amet',
            'address_2' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ',
            'osm_user_id' => 1,
            'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'osm_linked' => 1,
            'osm_linkdate' => $frozen,
            'osm_current_term' => 1,
            'osm_term_end' => $frozen
        ];

        $goodData = [
            'id' => 4,
            'username' => 'User3',
            'last_login' => $frozen,
            'login_count' => 1,
            'role_id' => 1,
            'auth_role_id' => 1,
            'section_id' => 1,
            'first_name' => 'Lorem dolor sit amet',
            'last_name' => 'Lorem ipsum sit amet',
            'email' => 'user@user.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'address_1' => 'Lorem ipsum dolor sit amet',
            'address_2' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ',
            'osm_user_id' => 2,
            'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'osm_linked' => 1,
            'osm_linkdate' => $frozen,
            'osm_current_term' => 1,
            'osm_term_end' => $frozen
        ];

        $duplicateEmailData = [
            'id' => 5,
            'username' => 'User2',
            'last_login' => $frozen,
            'login_count' => 1,
            'role_id' => 1,
            'auth_role_id' => 1,
            'section_id' => 1,
            'first_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'email' => 'user@user.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'address_1' => 'Lorem ipsum dolor sit amet',
            'address_2' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ',
            'osm_user_id' => 1,
            'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'osm_linked' => 1,
            'osm_linkdate' => $frozen,
            'osm_current_term' => 1,
            'osm_term_end' => $frozen
        ];

        $badEmailData = [
            'id' => 6,
            'username' => 'User7',
            'last_login' => $frozen,
            'login_count' => 1,
            'role_id' => 1,
            'auth_role_id' => 1,
            'section_id' => 1,
            'first_name' => 'Lorem dolor sit amet',
            'last_name' => 'Lorem ipsum sit amet',
            'email' => 'user',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'address_1' => 'Lorem ipsum dolor sit amet',
            'address_2' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ',
            'osm_user_id' => 2,
            'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'osm_linked' => 1,
            'osm_linkdate' => $frozen,
            'osm_current_term' => 1,
            'osm_term_end' => $frozen
        ];

        $expected = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 1,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen,
            ],
            [
                'id' => 2,
                'username' => 'User2',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'User2',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 1,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen
            ],
            [
                'id' => 4,
                'username' => 'User3',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem dolor sit amet',
                'last_name' => 'Lorem ipsum sit amet',
                'email' => 'user@user.com',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 2,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen
            ],
        ];

        $duplicateUsernameEntity = $this->Users->newEntity($duplicateUsernameData, ['accessibleFields' => ['id' => true]]);
        $duplicateEmailEntity = $this->Users->newEntity($duplicateEmailData, ['accessibleFields' => ['id' => true]]);
        $badEmailEntity = $this->Users->newEntity($badEmailData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Users->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->Users->save($duplicateUsernameEntity));
        $this->assertFalse($this->Users->save($duplicateEmailEntity));
        $this->assertFalse($this->Users->save($badEmailEntity));
        $this->assertNotFalse($this->Users->save($goodEntity));

        $query = $this->Users->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test SoftDelete method
     *
     * @return void
     */
    public function testSoftDelete()
    {
        $frozen = new FrozenTime('2017-06-18 22:05:00');

        $deletedData = [
            'id' => 3,
            'username' => 'User9',
            'last_login' => $frozen,
            'login_count' => 1,
            'role_id' => 1,
            'auth_role_id' => 1,
            'section_id' => 1,
            'first_name' => 'Lorem  sit amet',
            'last_name' => 'Lorem  sit amet',
            'email' => 'user@goat.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'address_1' => 'Lorem ipsum dolor sit amet',
            'address_2' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ',
            'osm_user_id' => 2,
            'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'osm_linked' => 1,
            'osm_linkdate' => $frozen,
            'osm_current_term' => 1,
            'osm_term_end' => $frozen,
            'deleted' => $frozen,
        ];

        $goodData = [
            'id' => 4,
            'username' => 'User3',
            'last_login' => $frozen,
            'login_count' => 1,
            'role_id' => 1,
            'auth_role_id' => 1,
            'section_id' => 1,
            'first_name' => 'Lorem dolor sit amet',
            'last_name' => 'Lorem ipsum sit amet',
            'email' => 'user@user.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'address_1' => 'Lorem ipsum dolor sit amet',
            'address_2' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ',
            'osm_user_id' => 2,
            'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'osm_linked' => 1,
            'osm_linkdate' => $frozen,
            'osm_current_term' => 1,
            'osm_term_end' => $frozen
        ];

        $expected = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 1,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen,
            ],
            [
                'id' => 2,
                'username' => 'User2',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'User2',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 1,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen
            ],
            [
                'id' => 4,
                'username' => 'User3',
                'last_login' => $frozen,
                'login_count' => 1,
                'role_id' => 1,
                'auth_role_id' => 1,
                'section_id' => 1,
                'first_name' => 'Lorem dolor sit amet',
                'last_name' => 'Lorem ipsum sit amet',
                'email' => 'user@user.com',
                'password' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsu',
                'address_1' => 'Lorem ipsum dolor sit amet',
                'address_2' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'county' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
                'osm_user_id' => 2,
                'osm_secret' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'osm_linked' => 1,
                'osm_linkdate' => $frozen,
                'osm_current_term' => 1,
                'osm_term_end' => $frozen
            ],
        ];

        $deletedEntity = $this->Users->newEntity($deletedData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Users->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertNotFalse($this->Users->save($deletedEntity));
        $this->assertNotFalse($this->Users->save($goodEntity));

        $query = $this->Users->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }
}
