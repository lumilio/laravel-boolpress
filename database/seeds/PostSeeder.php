<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $prod = new Post();
            $prod->cover = $faker->imageUrl(600, 400, 'Products');
            $prod->description = $faker->text();
            $prod->slug = Str::slug($prod->cover);
            $prod->save();
        }
    }
}
