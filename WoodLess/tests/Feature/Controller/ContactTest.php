<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class ContactTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test
     * Test to see if the user can view the contact form.
     */
    public function test_user_can_view_contact_form()
    {
        $response = $this->get(route('contact'));
        
        $response->assertStatus(200)
                 ->assertViewIs('contact');
    }
    
    /** @test 
     * Test to see if the contact form sends an email.
    */
    public function test_contact_form_sends_email()
    {
        Mail::fake();
        
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'message' => 'Test message',
        ];
        
        $response = $this->post(route('contact.send'), $data);
        
        $response->assertRedirect();
        $response->assertSessionHas('success');
        
        Mail::assertSent(ContactUsMail::class, function ($mail) use ($data) {
            return $mail->data['name'] === $data['name'] &&
                   $mail->data['email'] === $data['email'] &&
                   $mail->data['phone'] === $data['phone'] &&
                   $mail->data['message'] === $data['message'];
        });
    }    
}
