<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SectionsFixture
 *
 */
class SectionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'section' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'scout_group_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'section_type_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => 'now()', 'null' => false, 'comment' => null, 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'deleted' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_indexes' => [
            'sections_scout_group_id' => ['type' => 'index', 'columns' => ['scout_group_id'], 'length' => []],
            'sections_section_type_id' => ['type' => 'index', 'columns' => ['section_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'sections_section' => ['type' => 'unique', 'columns' => ['section'], 'length' => []],
            'sections_scout_group_id' => ['type' => 'foreign', 'columns' => ['scout_group_id'], 'references' => ['scout_groups', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'sections_section_type_id' => ['type' => 'foreign', 'columns' => ['section_type_id'], 'references' => ['section_types', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'section' => 'Lorem ipsum dolor sit amet',
            'scout_group_id' => 1,
            'section_type_id' => 1,
            'created' => 1497823488,
            'modified' => 1497823488,
            'deleted' => null,
        ],
        [
            'id' => 2,
            'section' => 'Secton2',
            'scout_group_id' => 1,
            'section_type_id' => 1,
            'created' => 1497823488,
            'modified' => 1497823488,
            'deleted' => null,
        ],
    ];
}
