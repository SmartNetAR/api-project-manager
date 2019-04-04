<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */
    public function Login()
    {
        $response = $this->post('/api/login');
        $response->assertStatus(422)
            ->assertSee('required');

        $response = $this->json('POST', 'api/login', [
            'email' => 'a@a',
            'password' => '111']);
        $response->assertStatus(401)
            ->assertSee('Unauthorised');
        
        $response = $this->json('POST', 'api/login', [
            'email' => 'leonardo@smartnet.com.ar',
            'password' => 'password']);
        $response->assertStatus(200)
            ->assertSee('token')
            ->assertSee('user');
    }
}
