<?php

namespace Tests\Feature\Models;

use App\Models\ImportanceLevel;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    protected $ticket;
    /**
     * Set up the ticket before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        ImportanceLevel::created([
            'level' => 'test'
        ]);
    }

    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

}
