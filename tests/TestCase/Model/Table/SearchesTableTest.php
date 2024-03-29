<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SearchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SearchesTable Test Case
 */
class SearchesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SearchesTable
     */
    public $Searches;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Searches'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Searches') ? [] : ['className' => SearchesTable::class];
        $this->Searches = TableRegistry::getTableLocator()->get('Searches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Searches);

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
