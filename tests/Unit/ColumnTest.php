<?php

namespace Tests\Unit;

use App\Models\Column;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ColumnTest extends TestCase
{
    use RefreshDatabase;

    public function test_column_can_be_created()
    {
        $column = Column::create([
            'title' => 'À faire',
            'user_id' => \App\Models\User::factory()->create()->id,
        ]);

        $this->assertInstanceOf(Column::class, $column);
        $this->assertEquals('À faire', $column->title);
    }

    public function test_column_has_tasks()
    {
        $column = Column::factory()->create();
        $task = Task::factory()->create(['column_id' => $column->id]);

        $this->assertTrue($column->tasks->contains($task));
        $this->assertEquals(1, $column->tasks->count());
    }
}
