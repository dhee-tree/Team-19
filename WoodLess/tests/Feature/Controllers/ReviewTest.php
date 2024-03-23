<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;
    protected $user;
    protected Product $product;

    /**
     * Set up the Controller before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->product = Product::factory()->create();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }
}
