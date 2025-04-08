<?php

namespace Tests\Unit;

use App\Http\Controllers\TaskController;
use App\Models\Task;
use App\Models\User;
use App\Models\Column;
use Illuminate\Http\Request;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    public function test_store_method_creates_task()
    {

        $user = User::factory()->make();
        $column = Column::factory()->make();


        $request = new Request([
            'title' => 'Nouvelle Tâche',
            'description' => 'Description',
            'column_id' => $column->id,
        ]);


        $this->actingAs($user);


        $taskMock = $this->createMock(Task::class);
        $taskMock->method('create')->willReturn(new Task([
            'title' => 'Nouvelle Tâche',
            'description' => 'Description',
            'user_id' => $user->id,
            'column_id' => $column->id,
        ]));

        $controller = new TaskController();

        $response = $controller->store($request);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('Nouvelle Tâche', $response->getData()->title);
    }
}
