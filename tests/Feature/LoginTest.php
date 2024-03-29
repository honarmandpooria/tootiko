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

        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'wrong_password'
        ])->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.'
            ]);
    }

    public function test_correct_redirect_after_user_logs_in()
    {
        $user = factory(User::class)->create();

        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'password'
        ])->assertRedirect('home');

    }

    public function test_customer_see_correct_page_after_login()
    {
        $user = factory(User::class)->create();

        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'password'
        ])->assertRedirect('home');


        $this->actingAs($user);
        $response = $this->get('/home');
        $response->assertSeeTextInOrder(['ثبت سفارش ترجمه']);

    }

}
