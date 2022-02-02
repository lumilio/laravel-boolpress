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
        $this->call(
            ProductSeeder::class,
            PostSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,


            /* serve per seeddare tutto insieme */
        );
    }
}
