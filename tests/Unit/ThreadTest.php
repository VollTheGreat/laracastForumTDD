<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function a_thread_has_a_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', factory('App\Thread')->create()->replies);
    }
    /** @test */
    public function a_thread_has_a_creator()
    {
        $this->assertInstanceOf('App\User', factory('App\Thread')->create()->creator);
    }
}
