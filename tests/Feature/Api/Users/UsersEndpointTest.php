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
    public function test_user_create_with_valid_inputs()
    {
        $response = $this->post('/users', [
            'title' => 'This is a test post.',
            'body' => 'Some lorem ipsum text.'
        ]);

        $response->assertStatus(200);
    }


    public function test_user_create_with_invalid_inputs()
    {
        $response = $this->post('/users', [
            'title' => 'This is a test post.',
            'body' => 'Some lorem ipsum text.'
        ]);

        $response->assertStatus(200);
    }


    public function test_user_create_with_duplicate_inputs()
    {
        $response = $this->post('/users', [
            'title' => 'This is a test post.',
            'body' => 'Some lorem ipsum text.'
        ]);

        $response->assertStatus(200);
    }


    public function test_users_get()
    {

    }

    public function test_user_get()
    {

    }

    public function test_user_edit_with_valid_inputs()
    {

    }

    public function test_user_edit_with_invalid_inputs()
    {

    }


    public function test_user_delete()
    {

    }



}
