<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolesTable;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolesTable Test Case
 */
class RolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RolesTable
     */
    public $Roles;

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
        $config = TableRegistry::exists('Roles') ? [] : ['className' => RolesTable::class];
        $this->Roles = TableRegistry::get('Roles', $config);

        $now = new Time('2017-06-18 22:00:32');
        Time::setTestNow($now);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Roles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $frozen = new FrozenTime('2017-06-18 22:00:32');

        $query = $this->Roles->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'role' => 'Role2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
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
        $frozen = new FrozenTime('2017-06-18 22:00:32');

        $badData = [
            'id' => null,
            'role' => null,
        ];

        $goodData = [
            'id' => 4,
            'role' => 'Role3',
        ];

        $expected = [
            [
                'id' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'role' => 'Role2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'role' => 'Role3',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ]
        ];

        $badEntity = $this->Roles->newEntity($badData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Roles->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->Roles->save($badEntity));
        $this->assertNotFalse($this->Roles->save($goodEntity));

        $query = $this->Roles->find('all');

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
        $frozen = new FrozenTime('2017-06-18 22:00:32');

        $duplicateData = [
            'id' => 3,
            'role' => 'Role2',
        ];

        $goodData = [
            'id' => 4,
            'role' => 'Role3',
        ];

        $expected = [
            [
                'id' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'role' => 'Role2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'role' => 'Role3',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ]
        ];

        $duplicateEntity = $this->Roles->newEntity($duplicateData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Roles->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->Roles->save($duplicateEntity));
        $this->assertNotFalse($this->Roles->save($goodEntity));

        $query = $this->Roles->find('all');

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
        $frozen = new FrozenTime('2017-06-18 22:00:32');

        $deletedData = [
            'id' => 3,
            'role' => 'Role9',
            'deleted' => $frozen
        ];

        $goodData = [
            'id' => 4,
            'role' => 'Role3',
        ];

        $expected = [
            [
                'id' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'role' => 'Role2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'role' => 'Role3',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ]
        ];

        $deletedEntity = $this->Roles->newEntity($deletedData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Roles->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertNotFalse($this->Roles->save($deletedEntity));
        $this->assertNotFalse($this->Roles->save($goodEntity));

        $query = $this->Roles->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }
}
