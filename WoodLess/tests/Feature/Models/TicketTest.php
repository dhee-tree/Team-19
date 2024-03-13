<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Ticket;
use App\Models\ImportanceLevel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketTest extends TestCase
{
    protected $ticket;
    /**
     * Set up the ticket before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->ticket = Ticket::factory()->create([
            'user_id' => User::factory()->create()->id,
            'importance_level_id' => ImportanceLevel::create(['level' => 'test'])->id,
            'information' => 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
        ]);
    }

    /**
     * Test that the ticket model can get it's importance level.
     */
    public function test_ticket_model_can_get_importance_level(): void
    {
        $this->assertInstanceOf(ImportanceLevel::class, $this->ticket->importanceLevel()->first());
    }

    /**
     * Test that the ticket model can get a truncated version of its description.
     */
    public function test_ticket_model_can_get_truncated_description(): void
    {
        $this->assertTrue(str_word_count($this->ticket->information) == 25);
        $this->assertTrue(str_word_count($this->ticket->truncateInformation()) == 20);
    }

}
