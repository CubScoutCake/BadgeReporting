<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScoutGroupsTable;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScoutGroupsTable Test Case
 */
class ScoutGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ScoutGroupsTable
     */
    public $ScoutGroups;

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
        $config = TableRegistry::exists('ScoutGroups') ? [] : ['className' => ScoutGroupsTable::class];
        $this->ScoutGroups = TableRegistry::get('ScoutGroups', $config);

        $now = new Time('2017-06-18 22:04:31');
        Time::setTestNow($now);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ScoutGroups);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $frozen = new FrozenTime('2017-06-18 22:04:31');

        $query = $this->ScoutGroups->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'scout_group' => 'Lorem ipsum dolor sit amet',
                'district_id' => 1,
                'number_stripped' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'scout_group' => 'ScoutGroup2',
                'district_id' => 1,
                'number_stripped' => 2,
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
        $frozen = new FrozenTime('2017-06-18 22:04:31');

        $badData = [
            'district_id' => null,
            'scout_group' => null,
            'number_stripped' => null
        ];

        $goodData = [
            'id' => 4,
            'district_id' => 1,
            'scout_group' => 'ScoutGroup3',
            'number_stripped' => 3,
        ];

        $expected = [
            [
                'id' => 1,
                'scout_group' => 'Lorem ipsum dolor sit amet',
                'district_id' => 1,
                'number_stripped' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'scout_group' => 'ScoutGroup2',
                'district_id' => 1,
                'number_stripped' => 2,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'scout_group' => 'ScoutGroup3',
                'district_id' => 1,
                'number_stripped' => 3,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $badEntity = $this->ScoutGroups->newEntity($badData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->ScoutGroups->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->ScoutGroups->save($badEntity));
        $this->assertNotFalse($this->ScoutGroups->save($goodEntity));

        $query = $this->ScoutGroups->find('all');

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
        $frozen = new FrozenTime('2017-06-18 22:04:31');

        $duplicateData = [
            'district_id' => 1,
            'scout_group' => 'ScoutGroup2',
            'number_stripped' => 2,
        ];

        $goodData = [
            'id' => 4,
            'district_id' => 1,
            'scout_group' => 'ScoutGroup3',
            'number_stripped' => 3,
        ];

        $expected = [
            [
                'id' => 1,
                'scout_group' => 'Lorem ipsum dolor sit amet',
                'district_id' => 1,
                'number_stripped' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'scout_group' => 'ScoutGroup2',
                'district_id' => 1,
                'number_stripped' => 2,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'scout_group' => 'ScoutGroup3',
                'district_id' => 1,
                'number_stripped' => 3,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $duplicateEntity = $this->ScoutGroups->newEntity($duplicateData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->ScoutGroups->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->ScoutGroups->save($duplicateEntity));
        $this->assertNotFalse($this->ScoutGroups->save($goodEntity));

        $query = $this->ScoutGroups->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }
}
