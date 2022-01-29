<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_arrey = [
            'Attulità',
            'Intrattenimento',
            'Sport',
            'Animazione',
            'Documentari',
        ];

        foreach ($category_arrey as $item){
            $_cat = new Category();
            $_cat->name = $item;
            $_cat->slug = Str::slug($_cat->name);
            $_cat->save();
            
        }
    }
}
