<?php

use \App\Post;

class PostModelTest extends TestCase
{
    function test_adding_a_tittle_generates_a_slug()
    {
        $post = new Post([
            'title' => 'Como instalar Laravel'
        ]);

        $this->assertSame('como-instalar-laravel', $post->slug);
    }

    function test_editing_the_title_changes_the_slug()
    {
        /*$post = new Post([
            'title' => 'Como instalar Laravel'
        ]);

        $post->title = 'Como instalar Laravel LTS';

        $this->assertSame('como_instalar_laravel_lts', $post->slug);*/
    }
}
