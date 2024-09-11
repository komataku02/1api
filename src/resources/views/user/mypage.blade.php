@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $user->name }}さんのマイページ</h1>
  <h2>出品リスト</h2>
  <ul>
    @foreach($items as $item)
    <li>{{ $item->name }} - {{ number_format($item->price) }}円</li>
    @endforeach
  </ul>
</div>
@endsection