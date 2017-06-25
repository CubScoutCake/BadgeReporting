<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthRolesTable;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthRolesTable Test Case
 */
class AuthRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthRolesTable
     */
    public $AuthRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auth_roles',
//        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuthRoles') ? [] : ['className' => AuthRolesTable::class];
        $this->AuthRoles = TableRegistry::get('AuthRoles', $config);

        $now = new Time('2017-06-18 21:59:06');
        Time::setTestNow($now);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthRoles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $query = $this->AuthRoles->find('all');

        $frozen = new FrozenTime('2017-06-18 21:59:06');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'auth_role' => 'User',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'auth_role' => 'Admin',
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
        $frozen = new FrozenTime('2017-06-18 21:59:06');

        $badData = [
            'id' => null,
            'auth_role' => null,
        ];

        $goodData = [
            'id' => 3,
            'auth_role' => 'SuperUser',
        ];

        $expected = [
            [
                'id' => 1,
                'auth_role' => 'User',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'auth_role' => 'Admin',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 3,
                'auth_role' => 'SuperUser',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $badEntity = $this->AuthRoles->newEntity($badData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->AuthRoles->newEntity($goodData, ['accessibleFields' => ['id' => true, '*' => true]]);

        $this->assertFalse($this->AuthRoles->save($badEntity));
        $this->assertNotFalse($this->AuthRoles->save($goodEntity));

        $query = $this->AuthRoles->find('all');

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
        $frozen = new FrozenTime('2017-06-18 21:59:06');

        $duplicateData = [
            'id' => 4,
            'auth_role' => 'Admin',
        ];

        $goodData = [
            'id' => 3,
            'auth_role' => 'SuperUser',
        ];

        $expected = [
            [
                'id' => 1,
                'auth_role' => 'User',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'auth_role' => 'Admin',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 3,
                'auth_role' => 'SuperUser',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $duplicateEntity = $this->AuthRoles->newEntity($duplicateData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->AuthRoles->newEntity($goodData, ['accessibleFields' => ['id' => true, '*' => true]]);

        $this->assertFalse($this->AuthRoles->save($duplicateEntity));
        $this->assertNotFalse($this->AuthRoles->save($goodEntity));

        $query = $this->AuthRoles->find('all');

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
        $frozen = new FrozenTime('2017-06-18 21:59:06');

        $deletedData = [
            'id' => 4,
            'auth_role' => 'NewUser',
            'deleted' => $frozen
        ];

        $goodData = [
            'id' => 3,
            'auth_role' => 'SuperUser',
        ];

        $expected = [
            [
                'id' => 1,
                'auth_role' => 'User',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'auth_role' => 'Admin',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 3,
                'auth_role' => 'SuperUser',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $deletedEntity = $this->AuthRoles->newEntity($deletedData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->AuthRoles->newEntity($goodData, ['accessibleFields' => ['id' => true, '*' => true]]);

        $this->assertNotFalse($this->AuthRoles->save($deletedEntity));
        $this->assertNotFalse($this->AuthRoles->save($goodEntity));

        $query = $this->AuthRoles->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }
}
