<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $prod = new Product();
            $prod->name = $faker->sentence();
            $prod->image = $faker->imageUrl(600, 400, 'Products');
            $prod->price = $faker->randomFloat(2, 100, 300);
            $prod->quantity = $faker->numberBetween(1, 100);
            $prod->description = $faker->text(); 
            $prod->save();
        }
    }
}
