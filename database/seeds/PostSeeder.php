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

            $prod->token1 = $faker->unique()->numberBetween(100000000, 1000000000);
            $prod->token2 = $faker->unique()->numberBetween(100000000, 1000000000);
            $prod->cover = $faker->imageUrl(600, 400, 'Products');
            $prod->description = $faker->text();
            $prod->slug = Str::slug($prod->token1); /* con l'intento di generare un id univoco per i post fatti con faker */

            $prod->save();
        }
    }
}
