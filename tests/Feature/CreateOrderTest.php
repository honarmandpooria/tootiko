<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateOrderTest extends TestCase
{


    public function test_a_user_can_create_order()
    {

        Storage::fake(config('filesystems.default'));

        $user = factory(User::class)->create();

        $this->actingAs($user);


        $this->post('/customer-orders', [

            'user_id' => 1,
            'status_id' => 1,
            'operation_id' => 1,
            'category_id' => 1,
            'translation_file' => UploadedFile::fake()->create('pdf_random.pdf', 123),
            'quality_id' => 1,
            'is_secret' => 1,
            'remaining_days' => 1,
            'description' => 'this is random description',


        ])->assertRedirect();

        $order = $user->orders()->latest()->first();

        Storage::disk(config('filesystems.default'))->assertExists($order->translation_file);


    }

}
