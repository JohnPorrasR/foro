<?php

class CreatePostTest extends FeatureTestCase
{

    public function test_a_user_create_a_post()
    {
        // Se tiene
        $title = 'Esta es una pregunta';
        $content = 'Esta es el contenido';

        $this->actingAs($user = $this->defaultUser());

        // cuando esta conectado
        $this->visit(route('posts.create'))
            ->type($title, 'title')
            ->type($content, 'content')
            ->press('Publicar');

        // entonces
        $this->seeInDatabase('posts', [
            'title' => $title,
            'content' => $content,
            'pending' => true,
            'user_id' => $user->id,
        ]);

        // user es redirigido cuando se rea el post
        $this->see($title);

    }

    public function test_creating_a_post_requires_authentication()
    {
        $this->visit(route('posts.create'))
            ->seePageIs(route('login'));
    }

    function test_create_post_form_validation()
    {
        $this->actingAs($this->defaultUser())
            ->visit(route('posts.create'))
            ->press('Publicar')
            ->seePageIs(route('posts.create'))
            ->seeErrors([
                'title' => 'El campo título es obligatorio',
                'content' => 'El campo contenido es obligatorio'
            ]);

    }

}























