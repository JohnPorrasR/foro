<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Comment;

class MarkComentAsAnswerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_a_post_can_be_answered()
    {
        $post = $this->createPost();

        $comment = factory(Comment::class)->create([
            'post_id' => $post->id
        ]);

        $comment->markAnAnswer();

        $this->assertTrue($comment->fresh()->answer);

        $this->assertFalse($post->fresh()->pending);

    }

    public function test_a_post_can_only_have_be_answer()
    {
        $post = $this->createPost();

        $comment = factory(Comment::class)->times(2)->create([
            'post_id' => $post->id
        ]);

        $comment->first()->markAnAnswer();

        $comment->last()->markAnAnswer();

        $this->assertFalse($comment->first()->fresh()->answer);

        $this->assertTrue($comment->last()->fresh()->answer);

    }
}
