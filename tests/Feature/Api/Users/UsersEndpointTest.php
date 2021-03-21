<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UsersEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_a_user()
    {
        $response = $this->post('/users', [
            'title' => 'This is a test post.',
            'body' => 'Some lorem ipsum text.'
        ]);

        $response->assertStatus(200);
    }
}
