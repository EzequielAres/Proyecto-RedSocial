<?php

use Illuminate\Database\Seeder;
use App\Comment;

class commentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create(
            array(
                "user_id" => "1",
                "image_id" => "2",
                "content" => "Comentario Ezequiel"
        ));

        Comment::create(
            array(
                "user_id" => "1",
                "image_id" => "7",
                "content" => "Comentario Ezequiel"
        ));

        Comment::create(
            array(
                "user_id" => "1",
                "image_id" => "8",
                "content" => "Comentario Ezequiel"
        ));

        Comment::create(
            array(
                "user_id" => "1",
                "image_id" => "9",
                "content" => "Comentario Ezequiel"
        ));

        Comment::create(
            array(
                "user_id" => "1",
                "image_id" => "11",
                "content" => "Comentario Ezequiel"
        ));

        Comment::create(
            array(
                "user_id" => "2",
                "image_id" => "1",
                "content" => "Comentario Paco"
        ));

        Comment::create(
            array(
                "user_id" => "2",
                "image_id" => "3",
                "content" => "Comentario Paco"
        ));

        Comment::create(
            array(
                "user_id" => "2",
                "image_id" => "12",
                "content" => "Comentario Paco"
        ));

        Comment::create(
            array(
                "user_id" => "2",
                "image_id" => "9",
                "content" => "Comentario Paco"
        ));

        Comment::create(
            array(
                "user_id" => "2",
                "image_id" => "7",
                "content" => "Comentario Paco"
        ));

        Comment::create(
            array(
                "user_id" => "3",
                "image_id" => "1",
                "content" => "Comentario Alex"
        ));

        Comment::create(
            array(
                "user_id" => "3",
                "image_id" => "4",
                "content" => "Comentario Alex"
        ));

        Comment::create(
            array(
                "user_id" => "3",
                "image_id" => "5",
                "content" => "Comentario Alex"
        ));

        Comment::create(
            array(
                "user_id" => "3",
                "image_id" => "11",
                "content" => "Comentario Alex"
        ));

        Comment::create(
            array(
                "user_id" => "3",
                "image_id" => "12",
                "content" => "Comentario Alex"
        ));

        Comment::create(
            array(
                "user_id" => "3",
                "image_id" => "9",
                "content" => "Comentario Alex"
        ));

        Comment::create(
            array(
                "user_id" => "4",
                "image_id" => "1",
                "content" => "Comentario Ana"
        ));

        Comment::create(
            array(
                "user_id" => "4",
                "image_id" => "5",
                "content" => "Comentario Ana"
        ));

        Comment::create(
            array(
                "user_id" => "4",
                "image_id" => "3",
                "content" => "Comentario Ana"
        ));

        Comment::create(
            array(
                "user_id" => "4",
                "image_id" => "9",
                "content" => "Comentario Ana"
        ));

        Comment::create(
            array(
                "user_id" => "4",
                "image_id" => "7",
                "content" => "Comentario Ana"
        ));

        Comment::create(
            array(
                "user_id" => "4",
                "image_id" => "10",
                "content" => "Comentario Ana"
        ));
    }
}
