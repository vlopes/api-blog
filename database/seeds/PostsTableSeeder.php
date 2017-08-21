<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'user_id' => 1,
                'title' => 'Titulo1',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod, 
                    enim a efficitur semper, enim augue viverra nunc, ac bibendum enim libero at urna. 
                    Morbi vitae molestie leo. Vivamus mi.'
            ],
            [
                'user_id' => 2,
                'title' => 'Titulo2',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod, 
                    enim a efficitur semper, enim augue viverra nunc, ac bibendum enim libero at urna. 
                    Morbi vitae molestie leo. Vivamus mi.'
            ],
            [
                'user_id' => 3,
                'title' => 'Titulo3',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod, 
                    enim a efficitur semper, enim augue viverra nunc, ac bibendum enim libero at urna. 
                    Morbi vitae molestie leo. Vivamus mi.'
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
