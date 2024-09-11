<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $fashion = Category::create(['name' => 'ファッション']);


        Category::create(['name' => 'メンズ', 'parent_id' => $fashion->id]);
        Category::create(['name' => 'レディース', 'parent_id' => $fashion->id]);

        $electronics = Category::create(['name' => '電子機器']);

        Category::create(['name' => 'スマートフォン', 'parent_id' => $electronics->id]);
        Category::create(['name' => 'PC', 'parent_id' => $electronics->id]);
    }
}
