<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    // use RefreshDatabase;

    // public function setUp():void 
    // {
    //     parent::setUp();
    //     $this->artisan('passport:install');
    //     // $this->artisan('passport:client --personal');
    // }

    public function test_register()
    {

        $response = $this->postJson('/api/register', [
            'name'  =>  $name = 'Test',
            'email'  =>  $email = 'test@example.com',
            'password'  =>  $password = '12345678',
        ]);

        $response->assertStatus(200);

        // Receive our token
        $this->assertArrayHasKey('token',$response->json());

    }

    public function test_login()
    {

        $response = $this->postJson('/api/login',[
            'email' => "test@example.com",
            'password' => 12345678,
        ]);

        $response->assertStatus(200);

        // Delete users
       // User::where('email','test@example.com')->delete();
    }
}
