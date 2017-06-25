<?php
use Migrations\AbstractSeed;

/**
 * TypesSeed seed.
 */
class TypesSeed extends AbstractSeed
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
        $this->call('AuthRolesSeed');
        $this->call('SectionTypesSeed');
    }
}
