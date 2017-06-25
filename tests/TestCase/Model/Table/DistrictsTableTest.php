<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistrictsTable;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistrictsTable Test Case
 */
class DistrictsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DistrictsTable
     */
    public $Districts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.districts',
        'app.scout_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Districts') ? [] : ['className' => DistrictsTable::class];
        $this->Districts = TableRegistry::get('Districts', $config);

        $now = new Time('2017-06-18 22:00:22');
        Time::setTestNow($now);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Districts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $frozen = new FrozenTime('2017-06-18 22:00:22');

        $query = $this->Districts->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'district' => 'Lorem ipsum dolor sit amet',
                'short_district' => 'Lorem',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'district' => 'District2',
                'short_district' => 'd2',
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
        $frozen = new FrozenTime('2017-06-18 22:00:22');

        $badData = [
            'district' => null,
            'county' => null,
        ];

        $goodData = [
            'id' => 4,
            'district' => 'Lorem fish dolor sit amet',
            'short_district' => 'fish',
        ];

        $expected = [
            [
                'id' => 1,
                'district' => 'Lorem ipsum dolor sit amet',
                'short_district' => 'Lorem',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'district' => 'District2',
                'short_district' => 'd2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'district' => 'Lorem fish dolor sit amet',
                'short_district' => 'fish',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ]
        ];

        $badEntity = $this->Districts->newEntity($badData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Districts->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->Districts->save($badEntity));
        $this->assertNotFalse($this->Districts->save($goodEntity));

        $query = $this->Districts->find('all');

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
        $frozen = new FrozenTime('2017-06-18 22:00:22');

        $duplicateData = [
            'district' => 'District2',
            'short_district' => 'fish',
            'id' => 3,
        ];

        $goodData = [
            'id' => 4,
            'district' => 'Lorem fish dolor sit amet',
            'short_district' => 'fish',
        ];

        $expected = [
            [
                'id' => 1,
                'district' => 'Lorem ipsum dolor sit amet',
                'short_district' => 'Lorem',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'district' => 'District2',
                'short_district' => 'd2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'district' => 'Lorem fish dolor sit amet',
                'short_district' => 'fish',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ]
        ];

        $duplicateEntity = $this->Districts->newEntity($duplicateData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Districts->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->Districts->save($duplicateEntity));
        $this->assertNotFalse($this->Districts->save($goodEntity));

        $query = $this->Districts->find('all');

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
        $frozen = new FrozenTime('2017-06-18 22:00:22');

        $deletedData = [
            'id' => 3,
            'district' => 'Lorem goat dolor sit amet',
            'short_district' => 'moo',
            'deleted' => $frozen
        ];

        $goodData = [
            'id' => 4,
            'district' => 'Lorem fish dolor sit amet',
            'short_district' => 'fish',
        ];

        $expected = [
            [
                'id' => 1,
                'district' => 'Lorem ipsum dolor sit amet',
                'short_district' => 'Lorem',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'district' => 'District2',
                'short_district' => 'd2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'district' => 'Lorem fish dolor sit amet',
                'short_district' => 'fish',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ]
        ];

        $deletedEntity = $this->Districts->newEntity($deletedData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Districts->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertNotFalse($this->Districts->save($deletedEntity));
        $this->assertNotFalse($this->Districts->save($goodEntity));

        $query = $this->Districts->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }
}
