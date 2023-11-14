<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_generate_access_token()
    {
        $response = $this->postJson('/api/auth', [
            'username' => 'tester',
            'password' => 'PASSWORD',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'meta' => [
                         'success',
                         'errors',
                     ],
                     'data' => [
                         'token',
                         'minutes_to_expire',
                     ],
                 ]);
    }

    /**
     * Test for unauthorized access.
     *
     * @return void
     */
    public function test_unauthorized_access()
    {
        $response = $this->postJson('/api/auth', [
            'username' => 'tester',
            'password' => 'incorrect_password',
        ]);

        $response->assertStatus(401)
                 ->assertJson([
                     'meta' => [
                         'success' => false,
                         'errors' => ['Password incorrect for: tester'],
                     ],
                 ]);
    }
}
