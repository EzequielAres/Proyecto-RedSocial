<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(imagesSeeder::class);
        $this->call(likesSeeder::class);
        $this->call(commentsSeeder::class);
    }
}
