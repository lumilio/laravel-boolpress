<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
            $prod->image = 'faker_store_images/'. $faker->image('storage/app/public/faker_store_images',600, 400, 'Products',false,true, $prod->name);
            $prod->price = $faker->randomFloat(2, 100, 300);
            $prod->quantity = $faker->numberBetween(1, 100);
            $prod->description = $faker->text();
            $prod->slug = Str::slug($prod->name); 
            $prod->save();
        }
    }
}
