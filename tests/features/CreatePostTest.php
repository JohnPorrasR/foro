<?php

class CreatePostTest extends FeatureTestCase
{

    public function test_a_user_create_a_post()
    {
        // Se tiene
        $title = 'Esta es una pregunta';
        $content = 'Esta es el contenido';

        $this->actingAs($this->defaultUser());

        // cuando esta conectado
        $this->visit(route('posts.create'))
             ->type($title, 'title')
             ->type($content, 'content')
             ->press('Publicar');

        // entonces
        $this->seeInDatabase('posts', [
            'title' => $title,
            'content' => $content,
            'pending' => true
        ]);

        // user es redirigido cuando se rea el post
        $this->see($title);

    }

}