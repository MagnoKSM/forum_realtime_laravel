<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Thread;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function testActionIndexOnController()
    {
        $user = factory(\App\User::class)->create();
        $this->seed('ThreadsTableSeeder');

        $threads = Thread::orderBy('updated_at', 'desc')
            ->paginate();

        $response = $this
            ->actingAs($user)
            ->json('GET','/threads');

        $response->assertStatus(200)
        ->assertJsonFragment([$threads->toArray()['data']]);
    }

//    public function testActionStoreOnController()
//    {
//        $user = factory(\App\User::class)->create();
//
//        $response = $this
//            ->actingAs($user)
//            ->json('POST','/threads', [
//                'title' => 'MY FIRST THREAD',
//                'body' => 'Text lorem ipsum text lorem'
//            ]);
//
//        $response->assertStatus(200)
//            ->assertJsonFragment(['created' => 'success']);
//    }
}
