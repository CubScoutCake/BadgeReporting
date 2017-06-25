<?php
use Migrations\AbstractSeed;

/**
 * AuthRoles seed.
 */
class AuthRolesSeed extends AbstractSeed
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
                'auth_role' => 'User',
                'created' => '2017-06-25 11:24:52.044821',
                'modified' => NULL,
            ],
            [
                'id' => 2,
                'auth_role' => 'Admin',
                'created' => '2017-06-25 11:25:06.808854',
                'modified' => NULL,
            ],
        ];

        $table = $this->table('auth_roles');
        $table->insert($data)->save();
    }
}
