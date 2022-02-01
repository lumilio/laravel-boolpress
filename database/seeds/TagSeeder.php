<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_array = [
            'pubblicità',
            'inserzione',
            'per adulti',
            'recente',
        ];

        foreach ($tag_array as $item){
            $_tag = new Tag();
            $_tag->name = $item;
            $_tag->slug = Str::slug($_tag->name);
            $_tag->save();
            
        }
    }
}
