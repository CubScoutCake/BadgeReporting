<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SectionTypesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SectionTypesController Test Case
 */
class SectionTypesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.section_types',
        'app.sections',
        'app.scout_groups',
        'app.districts',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(['controller' => 'SectionTypes', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/section-types/view/1');

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/section-types/add');

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/section-types/edit/1');

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

        $this->delete('/section-types/delete/2');

        $this->assertRedirect();
    }
}
