<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AuthRolesController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AuthRolesController Test Case
 */
class AuthRolesControllerTest extends IntegrationTestCase
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
        $this->get(['controller' => 'AuthRoles', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/auth-roles/view/1');

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/auth-roles/add');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'auth_role' => 'New Auth'
        ];

        $this->post('/auth-roles/add', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $auth_role = TableRegistry::get('AuthRoles');
        $query = $auth_role->find()->where(['auth_role' => $data['auth_role']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'auth_role' => 'Admin'
        ];

        $this->post('/auth-roles/add', $data);

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/auth-roles/edit/1');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'auth_role' => 'Changed Auth'
        ];

        $this->post('/auth-roles/edit/1', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $auth_role = TableRegistry::get('AuthRoles');
        $query = $auth_role->find()->where(['auth_role' => $data['auth_role']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'auth_role' => 'Admin'
        ];

        $this->post('/auth-roles/edit/1', $data);

        $this->assertResponseOk();
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

        $this->delete('/auth-roles/delete/2');

        $this->assertRedirect();

        $this->delete('/auth-roles/delete/2');

        $this->assertResponseError();

        $this->delete('/auth-roles/delete/99');

        $this->assertResponseError();
    }
}
