<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RolesController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RolesController Test Case
 */
class RolesControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(['controller' => 'Roles', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/roles/view/1');

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/roles/add');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'role' => 'New Role'
        ];

        $this->post('/roles/add', $data);

        $this->assertResponseSuccess();

        $auth_role = TableRegistry::get('Roles');
        $query = $auth_role->find()->where(['role' => $data['role']]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/roles/edit/1');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'role' => 'Changed Role'
        ];

        $this->post('/roles/edit/1', $data);

        $this->assertResponseSuccess();

        $auth_role = TableRegistry::get('Roles');
        $query = $auth_role->find()->where(['role' => $data['role']]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->delete('/roles/delete/2');

        $this->assertRedirect();
    }
}
