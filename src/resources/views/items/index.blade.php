@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="container">
  @if(request('query'))
  <h1>検索結果</h1>
  @if($items->isEmpty())
  <p>該当するアイテムが見つかりませんでした。</p>
  @else
  <ul>
    @foreach($items as $item)
    <li>{{ $item->name }} - {{ number_format($item->price) }}円</li>
    @endforeach
  </ul>
  @endif
  @else
  <h1>商品一覧</h1>
  @foreach($items as $item)
  <div class="item">
    @if($item->image)
    <img src="{{ $item->image }}" alt="{{ $item->name }}">
    @endif
    <div class="item-title">{{ $item->name }}</div>
    <div class="item-price">¥{{ number_format($item->price) }}</div>
    <div class="item-details">
      <div class="item-description">{{ $item->description }}</div>
      <div class="item-condition">状態: {{ $item->condition }}</div>
      <div class="item-category">カテゴリー: {{ $item->category->name }}</div>
    </div>
  </div>
  @endforeach
  @endif
</div>
@endsection