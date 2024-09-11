@extends('layouts.app')

@section('content')
<h1>アイテムの出品</h1>

<form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="name">商品名:</label>
    <input type="text" name="name" id="name" required>
  </div>
  <div>
    <label for="price">価格:</label>
    <input type="number" name="price" id="price" min="1000" max="50000" required>
  </div>
  <div>
    <label for="description">説明:</label>
    <textarea name="description" id="description" required></textarea>
  </div>
  <div>
    <label for="condition">商品の状態:</label>
    <select name="condition" id="condition" required>
      <option value="新品">新品</option>
      <option value="未使用に近い">未使用に近い</option>
      <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
      <option value="やや傷や汚れあり">やや傷や汚れあり</option>
      <option value="傷や汚れあり">傷や汚れあり</option>
      <option value="全体的に状態が悪い">全体的に状態が悪い</option>
    </select>
  </div>
  <div>
    <label for="category_id">カテゴリー:</label>
    <select name="category_id" id="category_id" required>
      @foreach ($categories as $category)
      <optgroup label="{{ $category->name }}">
        @foreach ($category->subcategories as $subcategory)
        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
        @endforeach
      </optgroup>
      @endforeach
    </select>
  </div>
  <div>
    <label for="image">画像:</label>
    <input type="file" name="image" id="image" required>
  </div>
  <button type="submit">出品する</button>
</form>
@endsection