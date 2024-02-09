<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_add_contact()
    {
        $user = User::factory()->create();

        $contactData = [
            'user_id' => $user->id,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'contact' => '1234567890',
        ];

        $response = $this->actingAs($user)->post('/contacts', $contactData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('contacts', $contactData);
    }

    public function test_a_user_can_delete_contact()
    {
        $this->withoutMiddleware();

        $user = User::factory()->create();

        $contact = Contact::factory()->create();

        $response = $this->actingAs($user)->delete("/contacts/{$contact->id}");

        $response->assertStatus(200);

        $this->assertSoftDeleted($contact);
    }

}
