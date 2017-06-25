<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DistrictsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\DistrictsController Test Case
 */
class DistrictsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.districts',
        'app.scout_groups'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(['controller' => 'Districts', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/districts/view/1');

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/districts/add');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'district' => 'New District',
            'short_district' => 'New',
        ];

        $this->post('/districts/add', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $articles = TableRegistry::get('Districts');
        $query = $articles->find()->where(['district' => $data['district']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'district' => 'District2',
            'short_district' => 'D2',
        ];

        $this->post('/districts/add', $data);

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/districts/edit/1');

        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'district' => 'Changed District',
            'short_district' => 'Changed',
        ];

        $this->post('/districts/edit/1', $data);

        $this->assertResponseSuccess();
        $this->assertRedirect();

        $articles = TableRegistry::get('Districts');
        $query = $articles->find()->where(['district' => $data['district']]);
        $this->assertEquals(1, $query->count());

        $data = [
            'district' => 'District2',
        ];

        $this->post('/districts/edit/1', $data);

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

        $this->delete('/districts/delete/2');

        $this->assertRedirect();

        $this->delete('/districts/delete/2');

        $this->assertResponseError();

        $this->delete('/districts/delete/99');

        $this->assertResponseError();
    }
}
