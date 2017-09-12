<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @test
     */
    public function a_user_can_browse_threads()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');

        $response->assertSee($thread->title);

    }
    /*
     * @test
     */
    public function a_user_can_view_single_thread() {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads/'.$thread->id);
        $response->assertSee($thread->title);
    }
}
