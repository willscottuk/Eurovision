<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RankingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RankingsTable Test Case
 */
class RankingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RankingsTable
     */
    public $Rankings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rankings',
        'app.countries',
        'app.votes',
        'app.users',
        'app.ranks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rankings') ? [] : ['className' => 'App\Model\Table\RankingsTable'];
        $this->Rankings = TableRegistry::get('Rankings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rankings);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
