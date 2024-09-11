<!DOCTYPE html>
<html>

<head>
  <title>商品一覧</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      width: 80%;
      margin: 0 auto;
    }

    .item {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
      margin-bottom: 20px;
    }

    .item img {
      max-width: 100%;
      border-radius: 5px;
    }

    .item-details {
      margin-top: 10px;
    }

    .item-title {
      font-size: 1.5em;
      margin-bottom: 10px;
    }

    .item-price {
      color: #e60012;
      font-size: 1.2em;
      margin-bottom: 10px;
    }

    .item-condition,
    .item-category {
      font-size: 0.9em;
      color: #666;
    }
  </style>
</head>

<body>
  <div class="container">
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
  </div>
</body>

</html>