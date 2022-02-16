<?php

use Illuminate\Database\Seeder;
use App\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            array(
                "name" => "Ezequiel",
                "surname" => "Ares",
                "nick" => "Zzequi",
                "email" => "ezequiel@gmail.com",
                "password" => bcrypt("pestillo"),
                "image" => "/avatares/MistBornAvatar.png"));
        User::create(
            array(
                "name" => "José",
                "surname" => "Otero",
                "nick" => "Paco",
                "email" => "paco@gmail.com",
                "password" => bcrypt("pestillo"),
                "image" => "null"
            ));
        User::create(    
            array(
                "name" => "Alex",
                "surname" => "Barberi",
                "nick" => "AlEx21",
                "email" => "alex@gmail.com",
                "password" => bcrypt("pestillo"),
                "image" => "null"
            ));
            User::create(    
                array(
                    "name" => "Ana",
                    "surname" => "Cáceres",
                    "nick" => "Ana_32",
                    "email" => "ana@gmail.com",
                    "password" => bcrypt("pestillo"),
                    "image" => "avatares/matrix.png"
                ));
    }
}
