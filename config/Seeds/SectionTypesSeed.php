<?php
use Migrations\AbstractSeed;

/**
 * SectionTypes seed.
 */
class SectionTypesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'section_type' => 'Beavers',
                'created' => '2017-06-25 11:25:42.110885',
                'modified' => NULL,
            ],
            [
                'id' => 2,
                'section_type' => 'Cubs',
                'created' => '2017-06-25 11:25:42.110885',
                'modified' => NULL,
            ],
            [
                'id' => 3,
                'section_type' => 'Scouts',
                'created' => '2017-06-25 11:25:42.110885',
                'modified' => NULL,
            ],
            [
                'id' => 4,
                'section_type' => 'Explorers',
                'created' => '2017-06-25 11:25:42.110885',
                'modified' => NULL,
            ],
        ];

        $table = $this->table('section_types');
        $table->insert($data)->save();
    }
}
