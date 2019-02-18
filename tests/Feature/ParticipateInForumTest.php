<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForum extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_may_not_add_replies() {
        $this->expectException("Illuminate\Auth\AuthenticationException");
        $thread = create("App\Thread");

        $this->post("/threads/1/replies", []);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads() {
        $this->be($user = create("App\User"));

        $thread = create("App\Thread");

        $reply = make("App\Reply");

        $this->post($thread->path()."/replies", $reply->toArray());

        $this->get($thread->path())->assertSee($reply->body);
    }
}
