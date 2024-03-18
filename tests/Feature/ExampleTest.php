<?php

namespace Modules\User\tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

// use App\Models\User;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_module_requires_auth(): void
    {
        $response = $this->get(route('user.index'));

        $response->assertStatus(302);
    }

    /**
     * A basic test example.
     */
    public function test_the_module_returns_a_successful_response(): void
    {
        $user = User::factory()->create();

        $user = $this->actingAs($user);
        // ->withSession(['banned' => false])
        // ->get('/');

        $response = $user->get(route('user.index'));

        $response->assertStatus(200);
    }
}
