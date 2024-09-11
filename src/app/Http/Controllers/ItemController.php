<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        // 商品を全件取得
        $items = Item::all();

        // ビューにデータを渡して表示
        return view('items.index', compact('items'));
    }
}
