<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectionsTable;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SectionsTable Test Case
 */
class SectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SectionsTable
     */
    public $Sections;

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
        $config = TableRegistry::exists('Sections') ? [] : ['className' => SectionsTable::class];
        $this->Sections = TableRegistry::get('Sections', $config);

        $now = new Time('2017-06-18 22:04:48');
        Time::setTestNow($now);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sections);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $frozen = new FrozenTime('2017-06-18 22:04:48');

        $query = $this->Sections->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'section' => 'Lorem ipsum dolor sit amet',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'section' => 'Secton2',
                'scout_group_id' => 1,
                'section_type_id' => 1,
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
        $frozen = new FrozenTime('2017-06-18 22:04:48');

        $badData = [
            'id' => 3,
            'section' => null,
            'scout_group_id' => null,
            'section_type_id' => null,
        ];

        $goodData = [
            'id' => 4,
            'section' => 'Section3',
            'scout_group_id' => 1,
            'section_type_id' => 1,
        ];

        $expected = [
            [
                'id' => 1,
                'section' => 'Lorem ipsum dolor sit amet',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'section' => 'Secton2',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'section' => 'Section3',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $badEntity = $this->Sections->newEntity($badData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Sections->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->Sections->save($badEntity));
        $this->assertNotFalse($this->Sections->save($goodEntity));

        $query = $this->Sections->find('all');

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
        $frozen = new FrozenTime('2017-06-18 22:04:48');

        $duplicateData = [
            'id' => 3,
            'section' => 'Secton2',
            'scout_group_id' => 1,
            'section_type_id' => 1,
        ];

        $goodData = [
            'id' => 4,
            'section' => 'Section3',
            'scout_group_id' => 1,
            'section_type_id' => 1,
        ];

        $expected = [
            [
                'id' => 1,
                'section' => 'Lorem ipsum dolor sit amet',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'section' => 'Secton2',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'section' => 'Section3',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $duplicateEntity = $this->Sections->newEntity($duplicateData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Sections->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertFalse($this->Sections->save($duplicateEntity));
        $this->assertNotFalse($this->Sections->save($goodEntity));

        $query = $this->Sections->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testSoftDelete()
    {
        $frozen = new FrozenTime('2017-06-18 22:04:48');

        $deletedData = [
            'id' => 3,
            'section' => 'Section9',
            'scout_group_id' => 1,
            'section_type_id' => 1,
            'deleted' => $frozen,
        ];

        $goodData = [
            'id' => 4,
            'section' => 'Section3',
            'scout_group_id' => 1,
            'section_type_id' => 1,
        ];

        $expected = [
            [
                'id' => 1,
                'section' => 'Lorem ipsum dolor sit amet',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 2,
                'section' => 'Secton2',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
            [
                'id' => 4,
                'section' => 'Section3',
                'scout_group_id' => 1,
                'section_type_id' => 1,
                'created' => $frozen,
                'modified' => $frozen,
                'deleted' => null,
            ],
        ];

        $deletedEntity = $this->Sections->newEntity($deletedData, ['accessibleFields' => ['id' => true]]);
        $goodEntity = $this->Sections->newEntity($goodData, ['accessibleFields' => ['id' => true]]);

        $this->assertNotFalse($this->Sections->save($deletedEntity));
        $this->assertNotFalse($this->Sections->save($goodEntity));

        $query = $this->Sections->find('all');

        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $this->assertEquals($expected, $result);
    }
}
