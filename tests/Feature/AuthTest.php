<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_and_login_with_email()
    {
        // Тест регистрации
        $registrationResponse = $this->postJson('/api/register', [
            'email' => 'laratest@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $registrationResponse
            ->assertStatus(201)
            ->assertJsonStructure(['user']);

        $this->assertDatabaseHas('users', [
            'email' => 'laratest@example.com',
        ]);

        // Тест логина
        $loginResponse = $this->postJson('/api/login', [
            'email' => 'laratest@example.com',
            'password' => 'password123',
        ]);

        $loginResponse
            ->assertStatus(200)
            ->assertJsonStructure(['token']);
    }
}
