<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SectionsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SectionsController Test Case
 */
class SectionsControllerTest extends IntegrationTestCase
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
        $this->get(['controller' => 'Sections', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/sections/view/1');

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/sections/add');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'section' => 'New Section',
            'scout_group_id' => 1,
            'section_type_id' => 1,
        ];

        $this->post('/sections/add', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $auth_role = TableRegistry::get('Sections');
        $query = $auth_role->find()->where(['section' => $data['section']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'section' => 'Secton2',
            'scout_group_id' => 1,
            'section_type_id' => 1,
        ];

        $this->post('/sections/add', $data);

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/sections/edit/1');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'section' => 'Changed Section',
            'scout_group_id' => 1,
            'section_type_id' => 1,
        ];

        $this->post('/sections/edit/1', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $auth_role = TableRegistry::get('Sections');
        $query = $auth_role->find()->where(['section' => $data['section']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'section' => 'Secton2',
        ];

        $this->post('/sections/edit/1', $data);

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

        $this->delete('/sections/delete/2');

        $this->assertRedirect();

        $this->delete('/sections/delete/2');

        $this->assertResponseError();

        $this->delete('/sections/delete/99');

        $this->assertResponseError();
    }
}
