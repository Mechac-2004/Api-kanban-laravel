<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use App\Models\Column;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_can_be_created()
    {
        $user = User::factory()->create();
        $column = Column::factory()->create(['user_id' => $user->id]);

        $task = Task::create([
            'title' => 'Tâche 1',
            'description' => 'Description de la tâche',
            'user_id' => $user->id,
            'column_id' => $column->id,
        ]);

        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals('Tâche 1', $task->title);
        $this->assertEquals('Description de la tâche', $task->description);
        $this->assertEquals($user->id, $task->user_id);
        $this->assertEquals($column->id, $task->column_id);
    }

    public function test_task_belongs_to_user()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $task->user);
        $this->assertEquals($user->id, $task->user->id);
    }

    public function test_task_belongs_to_column()
    {
        $column = Column::factory()->create();
        $task = Task::factory()->create(['column_id' => $column->id]);

        $this->assertInstanceOf(Column::class, $task->column);
        $this->assertEquals($column->id, $task->column->id);
    }
}
