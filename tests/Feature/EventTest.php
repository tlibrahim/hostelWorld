<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class EventTest extends TestCase
{

    protected function authenticate()
    {
        // $user = User::create([
        //     'name' => 'test',
        //     'email' =>'test@gmail.com',
        //     'password' => $password =bcrypt('12345678'),
        // ]);

        $response = $this->postJson('/api/login',[
            'email' => "test@example.com",
            'password' => 12345678,
        ]);

        if (auth()->attempt(['email' => "test@example.com", 'password'=> '12345678'])) {

            $token = auth()->user()->createToken('Laravel9PassportAuth')->accessToken;
            return response()->json(['token' => $token], 200);

        } else {

            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }


    public function test_get_events_by_date_only_with_right_format()
    {
        $token = $this->authenticate()->getOriginalContent();

        $response = $this->withHeaders(['Authorization' => 'Bearer '.$token['token']])
        ->post('/api/event', ["date"=>"2021-04-11"]);

        $response->assertStatus(200);

    }

    public function test_get_events_by_date_only_with_past_date()
    {
        $token = $this->authenticate()->getOriginalContent();

        $response = $this->withHeaders(['Authorization' => 'Bearer '.$token['token']])
        ->post('/api/event', ["date"=>"2021-03-11"]);

        $response->assertStatus(302);

    }


    public function test_get_events_by_country_and_date_with_right_format()
    {
        $token = $this->authenticate()->getOriginalContent();

        $response = $this->withHeaders(['Authorization' => 'Bearer '.$token['token']])
        ->post('/api/event', ["date"=>"2021-04-11","country"=>"Greece"]);

        $response->assertStatus(200);

    }


    public function test_get_events_by_city_and_date_with_right_format()
    {
        $token = $this->authenticate()->getOriginalContent();

        $response = $this->withHeaders(['Authorization' => 'Bearer '.$token['token']])
        ->post('/api/event', ["date"=>"2021-04-11","city"=>"Dupuyer"]);

        $response->assertStatus(200);

    }


    public function test_get_events_by_country_and_city()
    {
        $token = $this->authenticate()->getOriginalContent();

        $response = $this->withHeaders(['Authorization' => 'Bearer '.$token['token']])
        ->post('/api/event', ["country"=>"Greece","city"=>"Gorham"]);

        $response->assertStatus(200);

        // Delete users
        User::where('email','test@example.com')->delete();
    }
}
