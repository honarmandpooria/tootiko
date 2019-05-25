<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{

    public function test_a_user_get_correct_message_when_passing_wrong_credentials()
    {
        $user = factory(User::class)->create();

        $this->postJson('/login',[
            'email'=> $user->email,
            'password'=> 'wrong_password'
        ])->assertStatus(422)
        ->assertJson([
            'message' => 'The given data was invalid.'
        ]);
    }

}
