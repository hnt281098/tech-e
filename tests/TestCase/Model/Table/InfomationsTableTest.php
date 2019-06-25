<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InfomationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InfomationsTable Test Case
 */
class InfomationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InfomationsTable
     */
    public $Infomations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Infomations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Infomations') ? [] : ['className' => InfomationsTable::class];
        $this->Infomations = TableRegistry::getTableLocator()->get('Infomations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Infomations);

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
