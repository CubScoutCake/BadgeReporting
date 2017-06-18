<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthRolesTable Test Case
 */
class AuthRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthRolesTable
     */
    public $AuthRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auth_roles',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuthRoles') ? [] : ['className' => AuthRolesTable::class];
        $this->AuthRoles = TableRegistry::get('AuthRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthRoles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
