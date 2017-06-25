<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
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
        $this->get(['controller' => 'Users', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/users/view/1');

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/users/add');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'username' => 'NewUserName',
            'role_id' => 1,
            'auth_role_id' => 1,
            'section_id' => 1,
            'first_name' => 'PersonName',
            'last_name' => 'FamilyName',
            'email' => 'fish@llama.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsu',
            'address_1' => 'Lorem ipsum dolor sit amet',
            'address_2' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ',
        ];

        $this->post('/users/add', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $auth_role = TableRegistry::get('Users');
        $query = $auth_role->find()->where(['username' => $data['username']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'username' => 'User2',
        ];

        $this->post('/users/add', $data);

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/users/edit/1');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'username' => 'Changed UserName',
        ];

        $this->post('/users/edit/1', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $auth_role = TableRegistry::get('Users');
        $query = $auth_role->find()->where(['username' => $data['username']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'username' => 'User2',
        ];

        $this->post('/users/edit/1', $data);

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

        $this->delete('/users/delete/1');

        $this->assertRedirect();
    }
}
