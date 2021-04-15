<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CopiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CopiesTable Test Case
 */
class CopiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CopiesTable
     */
    protected $Copies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Copies',
        'app.Newlists',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Copies') ? [] : ['className' => CopiesTable::class];
        $this->Copies = $this->getTableLocator()->get('Copies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Copies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
