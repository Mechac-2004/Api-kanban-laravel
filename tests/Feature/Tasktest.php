<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_task()
    {
        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders(['Authorization' => "Bearer $token"])
                         ->postJson('/api/tasks', [
                             'title' => 'New Task',
                             'description' => 'Task description',
                             'column_id' => 1,
                         ]);

        $response->assertStatus(201)
                 ->assertJson(['title' => 'New Task']);
    }

    public function test_unauthenticated_user_cannot_create_task()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'New Task',
            'description' => 'Task description',
            'column_id' => 1,
        ]);

        $response->assertStatus(401);
    }
}
