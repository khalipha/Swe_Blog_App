<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
     use RefreshDatabase;

    public function test_post_insert()
    {
        $response = $this->call('POST', '/posts',
        [
        'title'     => 'My Day at the beach',
        'content'   => 'Talk about the best day of my life with my family in the sun',
        'author_id' => 1,
        ]);

        $response->assertStatus($response->status(),200);
    }

    public function test_posts_list()
    {
        $response = $this->get('posts');
        $response->assertStatus(200);  
    }

    public function test_post_update()
    {
       
        $post = Post::factory()->create([
            'title' => 'The laracast forum',
            'content' => 'A stackoverflow for laravel developers',
            'author_id' => 2,
        ]);

        
        $updatedData = [
            'title' => 'The laracast forum Beta',
        ];
        $post->update($updatedData);

        
        $this->assertDatabaseHas('posts', [
            'postID' => $post->postID,
            'title' => 'The laracast forum Beta',
        ]);
    }


    public function test_post_delete()
    {
        $post = Post::factory()->create();
             
        $post->delete();
       
        $this->assertDatabaseMissing('posts', [
            'postID' => $post->postID,
        ]);
    }
}
