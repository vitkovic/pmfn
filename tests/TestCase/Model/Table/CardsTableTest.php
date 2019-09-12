<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CardsTable Test Case
 */
class CardsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CardsTable
     */
    public $Cards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cards',
        'app.Deductions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cards') ? [] : ['className' => CardsTable::class];
        $this->Cards = TableRegistry::getTableLocator()->get('Cards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cards);

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
