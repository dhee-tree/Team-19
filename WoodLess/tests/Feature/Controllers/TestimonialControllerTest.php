<?php
namespace Tests\Feature\Controllers;
use App\Models\Testimonial;
use Tests\TestCase;
use App\Models\User;


class TestimonialControllerTest extends TestCase
{
    
    /**
     * Test if a testimonial can be stored.
     *
     * @return void
     */
    public function test_testimonial_can_be_stored()
    {
        // Simulate a user being authenticated
        $this->actingAs(User::factory()->create());
        // Simulate a request with valid data
        $response = $this->post('/testimonial', [
            'rating' => 5,
            'opinion' => 'This is a great product!',
        ]);
        // Assert that the response is a redirect
        $response->assertRedirect('/thankyou');
        // Assert that the testimonial was created in the database
        $this->assertDatabaseHas('testimonials', [
            'rating' => 5,
            'description' => 'This is a great product!',
            'user_id' => auth()->id(),
        ]);
    }
    /**
     * Test if validation fails for invalid data.
     *
     * @return void
     */
    public function test_opinion_required_for_testimonial_submission()
{
    // Simulate a user being authenticated
    $user = User::factory()->create();
    $this->actingAs($user);
    // Simulate a request with empty opinion
    $response = $this->post('/testimonial', [
        'rating' => 5,
        'opinion' => '', // Empty opinion
    ]);
    // Assert that the response status is 302 (redirect)
    $response->assertStatus(302);
    // Assert that the user is redirected back
    $response->assertRedirect();
    // Assert that the session has the error message
    $response->assertSessionHasErrors('opinion');
    // Assert that the testimonial was not created in the database
    $this->assertDatabaseMissing('testimonials', [
        'rating' => 5,
        'user_id' => $user->id,
    ]);
}
    /**
     * Test if a testimonial can be stored by an authenticated user.
     *
     * @return void
     */
    public function test_logged_in_user_can_submit_testimonial()
    {
        // Simulate a user being authenticated
        $user = User::factory()->create();
        $this->actingAs($user);
        // Simulate a request with valid data
        $response = $this->post('/testimonial', [
            'rating' => 5,
            'opinion' => 'This is a great product!',
        ]);
        // Assert that the response is a redirect
        $response->assertRedirect('/thankyou');
        // Assert that the testimonial was created in the database
        $this->assertDatabaseHas('testimonials', [
            'rating' => 5,
            'description' => 'This is a great product!',
            'user_id' => $user->id,
        ]);
    }
    /**
     * Test if a guest user is redirected to the login page when trying to access the testimonial page.
     *
     * @return void
     */
    public function test_guest_user_redirected_to_login_page()
    {
        // Simulate a request from a guest user
        $response = $this->get('/testimonial');
        // Assert that the response status is 302 (redirect)
        $response->assertStatus(302);
        // Assert that the user is redirected to the login page
        $response->assertRedirect('/login');
    }
}
