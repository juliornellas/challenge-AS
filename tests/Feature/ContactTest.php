<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_add_contact()
    {
        // $this->withoutMiddleware();

        $user = User::factory()->create();

        Sanctum::actingAs(
            $user,
            ['*']
        );

        $contactData = [
            'user_id' => $user->id,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'contact' => '123456789',
        ];

        $response = $this
        // ->actingAs($user)
        ->post('/contacts', $contactData);

        $response->assertStatus(419);

        $this->assertDatabaseHas('contacts', $contactData);
    }

    public function test_a_user_can_delete_contact()
    {
        // $this->withoutMiddleware();

        $user = User::factory()->create();

        Sanctum::actingAs(
            $user,
            ['*']
        );

        $contact = Contact::factory()->create();

        $response = $this->actingAs($user)->delete("/contacts/{$contact->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('contacts',['id' => $contact->id]);
    }

}