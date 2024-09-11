<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    private static $itemCount = 1;

    public function definition()
    {
        return [
            'name' =>
            '商品' . self::$itemCount++,
            'price' => $this->faker->numberBetween(1000, 50000),
            'description'
            => '商品説明 ' . str_repeat('商品説明 ', 5),
            'condition' => $this->faker->randomElement([
                '新品',
                '未使用に近い',
                '目立った傷や汚れなし',
                'やや傷や汚れあり',
                '傷や汚れあり',
                '全体的に状態が悪い'
            ]),
            'category_id' => Category::inRandomOrder()->first()->id, // ランダムなカテゴリー
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // ランダムなユーザー
            'image' => $this->faker->imageUrl(640, 480, 'fashion', true), // ダミー画像のURL
        ];
    }
}
