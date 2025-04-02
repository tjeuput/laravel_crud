<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_display_post(): void
    {
        Post::factory()->count(3)->create();
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertViewIs('blog.index');
        $response->assertViewHas('posts');
        $posts = $response->viewData('posts');
        $this->assertCount(3, $posts);

        $posts = $response->viewData('posts');
        $this->assertCount(3, $posts);
    }

    public function test_show_displays_single_post(): void
    {
        $post = Post::factory()->create([
            'title' => 'Test post title',
            'body' => 'Test post body'
        ]);

        $response = $this->get("/blog/{$post->id}");
        $response->assertStatus(200);
        $response->assertViewIs('blog.show');
        $response->assertSee('Test post body');
        $response->assertSee('Test post title');

        $viewPost = $response->viewData('post');
        $this->assertEquals($post->id, $viewPost->id);
        $this->assertEquals($post->title, $viewPost->title);

    }

    public function test_show_displays_404_error_for_nonexistent_post(): void{
        $response = $this->get('/blog/001');
        $response->assertStatus(404);
    }
}
