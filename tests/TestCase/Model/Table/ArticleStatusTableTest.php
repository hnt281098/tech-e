<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticleStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticleStatusTable Test Case
 */
class ArticleStatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticleStatusTable
     */
    public $ArticleStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ArticleStatus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArticleStatus') ? [] : ['className' => ArticleStatusTable::class];
        $this->ArticleStatus = TableRegistry::getTableLocator()->get('ArticleStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArticleStatus);

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
