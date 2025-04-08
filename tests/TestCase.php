<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function createAuthenticatedUser()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user, 'sanctum');
        return $user;
    }

    protected function createColumnForUser($user)
    {
        return \App\Models\Column::factory()->create([
            'user_id' => $user->id,
        ]);
    }

    protected function createTaskForUserAndColumn($user, $column)
    {
        return \App\Models\Task::factory()->create([
            'user_id' => $user->id,
            'column_id' => $column->id,
        ]);
    }
}
