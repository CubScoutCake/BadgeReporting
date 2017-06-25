<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ScoutGroupsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ScoutGroupsController Test Case
 */
class ScoutGroupsControllerTest extends IntegrationTestCase
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
        $this->get(['controller' => 'ScoutGroups', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/scout-groups/view/1');

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/scout-groups/add');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'scout_group' => 'New Group',
            'district_id' => 1,
            'number_stripped' => 6,
        ];

        $this->post('/scout-groups/add', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $auth_role = TableRegistry::get('ScoutGroups');
        $query = $auth_role->find()->where(['scout_group' => $data['scout_group']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'scout_group' => 'ScoutGroup2',
            'district_id' => 1,
            'number_stripped' => 8,
        ];

        $this->post('/scout-groups/add', $data);

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/scout-groups/edit/1');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'scout_group' => 'Changed Group',
            'district_id' => 1,
            'number_stripped' => 8,
        ];

        $this->post('/scout-groups/edit/1', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $auth_role = TableRegistry::get('ScoutGroups');
        $query = $auth_role->find()->where(['scout_group' => $data['scout_group']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'scout_group' => 'ScoutGroup2',
        ];

        $this->post('/scout-groups/edit/1', $data);

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

        $this->delete('/scout-groups/delete/2');

        $this->assertRedirect();
    }
}
