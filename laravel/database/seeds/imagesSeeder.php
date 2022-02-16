<?php

use Illuminate\Database\Seeder;
use App\Image;

class imagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create(
            array(
                "user_id" => "1",
                "image_path" => "images/primeraImagen.jpg",
                "description" => "Descripción imagen 1 Ezequiel"
        ));
        
        Image::create(
            array(
                "user_id" => "1",
                "image_path" => "images/segundaImagen.jpg",
                "description" => "Descripción imagen 2 Ezequiel"
        ));

        Image::create(
            array(
                "user_id" => "1",
                "image_path" => "images/terceraImagen.jpg",
                "description" => "Descripción imagen 3 Ezequiel"
        ));
        Image::create(
            array(
                "user_id" => "1",
                "image_path" => "images/cuartaImagen.jpeg",
                "description" => "Descripción imagen 4 Ezequiel"
        ));
        
        Image::create(
            array(
                "user_id" => "1",
                "image_path" => "images/quintaImagen.jpg",
                "description" => "Descripción imagen 5 Ezequiel"
        ));

        Image::create(
            array(
                "user_id" => "1",
                "image_path" => "images/sextaImagen.jpg",
                "description" => "Descripción imagen 6 Ezequiel"
        ));

        Image::create(
            array(
                "user_id" => "2",
                "image_path" => "images/septimaImagen.jpg",
                "description" => "Descripción imagen 1 José"
        ));
        
        Image::create(
            array(
                "user_id" => "2",
                "image_path" => "images/octavaImagen.jpg",
                "description" => "Descripción imagen 2 José"
        ));

        Image::create(
            array(
                "user_id" => "2",
                "image_path" => "images/novenaImagen.jpg",
                "description" => "Descripción imagen 3 José"
        ));

        Image::create(
            array(
                "user_id" => "3",
                "image_path" => "images/decimaImagen.jpg",
                "description" => "Descripción imagen 1 Alex"
        ));
        
        Image::create(
            array(
                "user_id" => "3",
                "image_path" => "images/undecimaImagen.jpg",
                "description" => "Descripción imagen 2 Alex"
        ));

        Image::create(
            array(
                "user_id" => "3",
                "image_path" => "images/duodecimaImagen.jpg",
                "description" => "Descripción imagen 3 Alex"
        ));
    }
}
