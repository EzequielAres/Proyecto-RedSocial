<?php

use Illuminate\Database\Seeder;
use App\Like;

class likesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::create(
            array(
                "user_id" => "1",
                "image_id" => "7"
        ));

        Like::create(
            array(
                "user_id" => "1",
                "image_id" => "9"
        ));

        Like::create(
            array(
                "user_id" => "1",
                "image_id" => "11"
        ));

        Like::create(
            array(
                "user_id" => "1",
                "image_id" => "12"
        ));

        Like::create(
            array(
                "user_id" => "1",
                "image_id" => "10"
        ));

        Like::create(
            array(
                "user_id" => "2",
                "image_id" => "1"
        ));

        Like::create(
            array(
                "user_id" => "2",
                "image_id" => "12"
        ));

        Like::create(
            array(
                "user_id" => "2",
                "image_id" => "2"
        ));

        Like::create(
            array(
                "user_id" => "2",
                "image_id" => "10"
        ));

        Like::create(
            array(
                "user_id" => "2",
                "image_id" => "4"
        ));

        Like::create(
            array(
                "user_id" => "3",
                "image_id" => "1"
        ));

        Like::create(
            array(
                "user_id" => "3",
                "image_id" => "6"
        ));

        Like::create(
            array(
                "user_id" => "3",
                "image_id" => "4"
        ));

        Like::create(
            array(
                "user_id" => "3",
                "image_id" => "2"
        ));

        Like::create(
            array(
                "user_id" => "3",
                "image_id" => "8"
        ));

        Like::create(
            array(
                "user_id" => "4",
                "image_id" => "1"
        ));

        Like::create(
            array(
                "user_id" => "4",
                "image_id" => "10"
        ));

        Like::create(
            array(
                "user_id" => "4",
                "image_id" => "3"
        ));

        Like::create(
            array(
                "user_id" => "4",
                "image_id" => "5"
        ));

        Like::create(
            array(
                "user_id" => "4",
                "image_id" => "7"
        ));

        Like::create(
            array(
                "user_id" => "4",
                "image_id" => "9"
        ));

        Like::create(
            array(
                "user_id" => "4",
                "image_id" => "12"
        ));
    }
}
