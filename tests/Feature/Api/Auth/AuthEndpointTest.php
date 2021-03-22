<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_unauthenticated_client()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_authenticated_client()
    {

    }


    public function test_auth_token_refresh()
    {

        
    }
}
