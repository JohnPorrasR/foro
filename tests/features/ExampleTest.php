<?php

class ExampleTest extends FeatureTestCase
{

    function test_basic_example()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'John Porras R',
            'email' => 'admin@johnporrasr.com',
        ]);

        $this->actingAs($user, 'api')
             ->visit('api/user')
            ->see('John Porras R')
            ->see('admin@johnporrasr.com');
    }

}
