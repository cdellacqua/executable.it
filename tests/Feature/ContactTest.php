<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     */
    public function testContactCreation()
    {
        $postResponse = $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'email@example.com',
            'phone' => '3030303030',
            'message' => 'Long text message',
            'privacy' => 'true'
        ]);

        $postResponse
            ->assertRedirect(route_locale('contacts-tp'))
            ->assertStatus(303);

        $getResponse = $this->get($postResponse->headers->get('Location'));
        $getResponse->assertStatus(201);
    }

    /**
     * @return void
     */
    public function testInvalidFirstName()
    {
        $this->post(route_locale('contacts'), [
            'first_name' => 'f',
            'last_name' => 'Last Name',
            'email' => 'email@example.com',
            'phone' => '3030303030',
            'message' => 'Long text message',
            'privacy' => 'true'
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('first_name');
    }

    /**
     * @return void
     */
    public function testInvalidLastName()
    {
        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'L',
            'email' => 'email@example.com',
            'phone' => '3030303030',
            'message' => 'Long text message',
            'privacy' => 'true'
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('last_name');
    }

    /**
     * @return void
     */
    public function testInvalidEmail()
    {
        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'email(at)example.com',
            'phone' => '3030303030',
            'message' => 'Long text message',
            'privacy' => 'true'
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('email');

        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'example.com',
            'phone' => '3030303030',
            'message' => 'Long text message',
            'privacy' => 'true'
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('email');

        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'email@example',
            'phone' => '3030303030',
            'message' => 'Long text message',
            'privacy' => 'true'
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('email');
    }

    /**
     * @return void
     */
    public function testInvalidPhone()
    {
        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'email@example.com',
            'phone' => '1234',
            'message' => 'Long text message',
            'privacy' => 'true'
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('phone');
    }

    /**
     * @return void
     */
    public function testInvalidMessage()
    {
        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'email@example.com',
            'message' => 'sh',
            'privacy' => 'true'
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('message');
    }

    /**
     * @return void
     */
    public function testInvalidConsent()
    {
        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'email@example.com',
            'message' => 'Long text message',
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('privacy');

        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'email@example.com',
            'message' => 'Long text message',
            'privacy' => ''
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('privacy');

        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'email@example.com',
            'message' => 'Long text message',
            'privacy' => 'false'
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('privacy');

        $this->post(route_locale('contacts'), [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'email@example.com',
            'message' => 'Long text message',
            'privacy' => 'off'
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors('privacy');

    }
}
