<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;
use App\Models\User;

class ItemSeeder extends Seeder
{

    public function run()
    {
        // ユーザーとカテゴリーを取得
        $user = User::first(); // 例として最初のユーザーを使用
        $categories = Category::all();

        // 商品データの作成
        Item::create([
            'name' => '特別な商品',
            'price' => 5000,
            'description' => '特別な商品説明です。',
            'condition' => '新品',
            'image' => 'https://via.placeholder.com/150',
            'category_id' => $categories->first()->id, // 例として最初のカテゴリーを使用
            'user_id' => $user->id,
        ]);

        // ダミーデータの作成
        Item::factory()->count(50)->create();
    }
}
