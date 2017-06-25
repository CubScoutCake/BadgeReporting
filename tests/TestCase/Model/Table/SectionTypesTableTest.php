<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectionTypesTable;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SectionTypesTable Test Case
 */
class SectionTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SectionTypesTable
     */
    public $SectionTypes;

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
        $config = TableRegistry::exists('SectionTypes') ? [] : ['className' => SectionTypesTable::class];
        $this->SectionTypes = TableRegistry::get('SectionTypes', $config);

        $now = new Time('2017-06-18 22:04:43');
        Time::setTestNow($now);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SectionTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $frozen = new FrozenTime('2017-06-18 22:04:43');

        $query = $this->SectionTypes->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'section_type' => 'Lorem ipsum dolor sit amet',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'section_type' => 'Type2',
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
        $frozen = new FrozenTime('2017-06-18 22:04:43');

        $badData = [
            'id' => 3,
            'section_type' => null,
        ];

        $goodData = [
            'id' => 4,
            'section_type' => 'Type3',
        ];

        $expected = [
            [
                'id' => 1,
                'section_type' => 'Lorem ipsum dolor sit amet',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'section_type' => 'Type2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'section_type' => 'Type3',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $badEntity = $this->SectionTypes->newEntity($badData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->SectionTypes->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->SectionTypes->save($badEntity));
        $this->assertNotFalse($this->SectionTypes->save($goodEntity));

        $query = $this->SectionTypes->find('all');

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
        $frozen = new FrozenTime('2017-06-18 22:04:43');

        $duplicateData = [
            'id' => 3,
            'section_type' => 'Type2',
        ];

        $goodData = [
            'id' => 4,
            'section_type' => 'Type3',
        ];

        $expected = [
            [
                'id' => 1,
                'section_type' => 'Lorem ipsum dolor sit amet',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'section_type' => 'Type2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'section_type' => 'Type3',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $duplicateEntity = $this->SectionTypes->newEntity($duplicateData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->SectionTypes->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->SectionTypes->save($duplicateEntity));
        $this->assertNotFalse($this->SectionTypes->save($goodEntity));

        $query = $this->SectionTypes->find('all');

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
        $frozen = new FrozenTime('2017-06-18 22:04:43');

        $deletedData = [
            'id' => 3,
            'section_type' => 'Type9',
            'deleted' => $frozen,
        ];

        $goodData = [
            'id' => 4,
            'section_type' => 'Type3',
        ];

        $expected = [
            [
                'id' => 1,
                'section_type' => 'Lorem ipsum dolor sit amet',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'section_type' => 'Type2',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'section_type' => 'Type3',
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $deletedEntity = $this->SectionTypes->newEntity($deletedData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->SectionTypes->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertNotFalse($this->SectionTypes->save($deletedEntity));
        $this->assertNotFalse($this->SectionTypes->save($goodEntity));

        $query = $this->SectionTypes->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }
}
