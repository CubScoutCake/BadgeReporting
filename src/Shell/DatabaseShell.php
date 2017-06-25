<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use Migrations\Migrations;

/**
 * Database shell command.
 */
class DatabaseShell extends Shell
{
    /**
     * Function to build the database via migrations.
     *
     * @return void
     */
    public function build()
    {
        $migrations = new Migrations();

        $migrate = $migrations->migrate();
        if (!$migrate) {
            $this->out('Database Migration Implementation Failed.');

            return;
        }
        $this->out('Database Migration Implementation Succeeded.');
    }

    /**
     * Function to add basic config data to the database.
     *
     * @return void
     */
    public function seed()
    {
        $migrations = new Migrations();

        $seeded = $migrations->seed(['seed' => 'TypesSeed']);
        if (!$seeded) {
            $this->out('Type Seeding Failed.');

            return;
        }
        $this->out('Type Seeding Succeeded.');

        $seeded = $migrations->seed(['seed' => 'CountysSeed']);
        if (!$seeded) {
            $this->out('County Seeding Failed.');

            return;
        }
        $this->out('County Seeding Succeeded.');
    }

    /**
     * Hashes the password for the inital user with the installed Hash.
     *
     * @return void
     */
    public function password()
    {
        $users = TableRegistry::get('Users');

        $default = $users->findByUsername('Jacob')->first();
        $default->password = 'TestMe';

        if (!$users->save($default)) {
            $this->out('User Password Reset Failed.');

            return;
        }
        $this->out('User Password Reset Succeeded.');
    }
}
