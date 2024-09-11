<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // 検索クエリがあれば、その結果を取得
            $items = Item::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();
        } else {
            // 検索クエリがない場合は全ての商品を取得
            $items = Item::all();
        }

        return view('items.index', compact('items'));
    }

    // 出品ページの表示
    public function create()
    {
        $categories = Category::with('subcategories')->get(); // 大カテゴリーと小カテゴリーを取得
        return view('items.create', compact('categories'));
    }

    // 出品アイテムの保存
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:1000|max:50000',
            'description' => 'required|string',
            'condition' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 画像ファイルの保存
        $imagePath = $request->file('image')->store('images', 'public');

        // 新しいアイテムを作成
        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'condition' => $request->condition,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(), // 出品者のIDを保存
            'image' => $imagePath,
        ]);

        return redirect()->route('home')->with('success', 'アイテムが正常に出品されました！');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = Item::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('items.index', compact('items'));
    }

}
