<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TodolistsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TodolistsTable Test Case
 */
class TodolistsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TodolistsTable
     */
    protected $Todolists;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Todolists',
        'app.Users',
        'app.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Todolists') ? [] : ['className' => TodolistsTable::class];
        $this->Todolists = $this->getTableLocator()->get('Todolists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Todolists);

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
