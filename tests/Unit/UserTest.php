<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_created()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('test@example.com', $user->email);
        $this->assertTrue(password_verify('password123', $user->password));
    }

    public function test_user_has_tasks()
    {
        $user = User::factory()->create();
        $task = \App\Models\Task::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($user->tasks->contains($task));
        $this->assertEquals(1, $user->tasks->count());
    }
}
