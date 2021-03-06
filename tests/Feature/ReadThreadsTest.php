<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }

    /**
     * @test
     */
    public function a_user_can_browse_threads()
    {
        $response = $this->get('/threads')->assertSee($this->thread->title);
    }
    /**
     * @test
     */
    public function a_user_can_view_single_thread() {
        $response = $this->get('/threads/'.$this->thread->id)->assertSee($this->thread->title);
    }
    /** @test */
    public function a_user_can_see_replies()
    {
       $reply =  factory('App\Reply')->create(['thread_id'=>$this->thread->id]);
       $this->get('/threads/'.$this->thread->id)->assertSee($reply->body);
    }

}
