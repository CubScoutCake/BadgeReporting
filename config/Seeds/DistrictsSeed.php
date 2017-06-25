<?php
use Migrations\AbstractSeed;

/**
 * Districts seed.
 */
class DistrictsSeed extends AbstractSeed
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
                'id' => '1',
                'district' => 'Letchworth & Baldock',
                'deleted' => NULL,
                'short_district' => 'L&B',
            ],
            [
                'id' => '2',
                'district' => 'Bishops Stortford And District',
                'deleted' => NULL,
                'short_district' => 'Bishops',
            ],
            [
                'id' => '3',
                'district' => 'East Herts',
                'deleted' => NULL,
                'short_district' => 'EastHerts',
            ],
            [
                'id' => '4',
                'district' => 'Elstree And District',
                'deleted' => NULL,
                'short_district' => 'Elstree',
            ],
            [
                'id' => '5',
                'district' => 'Harpenden And Wheathampstead',
                'deleted' => NULL,
                'short_district' => 'Harpenden',
            ],
            [
                'id' => '6',
                'district' => 'Hemel Hempstead',
                'deleted' => NULL,
                'short_district' => 'Hemel',
            ],
            [
                'id' => '7',
                'district' => 'Hertford',
                'deleted' => NULL,
                'short_district' => 'Hertford',
            ],
            [
                'id' => '8',
                'district' => 'Hitchin And District',
                'deleted' => NULL,
                'short_district' => 'Hitchin',
            ],
            [
                'id' => '9',
                'district' => 'Mid Herts',
                'deleted' => NULL,
                'short_district' => 'MidHerts',
            ],
            [
                'id' => '10',
                'district' => 'Potters Bar And District',
                'deleted' => NULL,
                'short_district' => 'PottersBar',
            ],
            [
                'id' => '11',
                'district' => 'Rickmansworth And Chorleywood',
                'deleted' => NULL,
                'short_district' => 'Ricky&C\'wood',
            ],
            [
                'id' => '12',
                'district' => 'Royston',
                'deleted' => NULL,
                'short_district' => 'Royston',
            ],
            [
                'id' => '13',
                'district' => 'St Albans',
                'deleted' => NULL,
                'short_district' => 'St Albans',
            ],
            [
                'id' => '14',
                'district' => 'Stevenage',
                'deleted' => NULL,
                'short_district' => 'Stevenage',
            ],
            [
                'id' => '15',
                'district' => 'Ware And District',
                'deleted' => NULL,
                'short_district' => 'Ware',
            ],
            [
                'id' => '16',
                'district' => 'Watford North',
                'deleted' => NULL,
                'short_district' => 'Watford (N)',
            ],
            [
                'id' => '17',
                'district' => 'Watford South',
                'deleted' => NULL,
                'short_district' => 'Watford (S)',
            ],
            [
                'id' => '18',
                'district' => 'West Herts',
                'deleted' => NULL,
                'short_district' => 'WestHerts',
            ],
        ];

        $table = $this->table('districts');
        $table->insert($data)->save();
    }
}
