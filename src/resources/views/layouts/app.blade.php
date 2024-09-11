<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>フリマアプリ</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">フリマアプリ</a>

        @if (Route::is('login') || Route::is('register'))
        <!-- ログイン画面や会員登録画面ではサイト名のみ表示 -->
        @elseif (Auth::check())
        <!-- ログイン後のヘッダー -->
        <form action="{{ route('items.search') }}" method="GET" class="search-form">
          <input type="text" name="query" placeholder="何をお探しですか？">
          <button type="submit">検索</button>
        </form>
        <a href="{{ route('user.mypage') }}" class="btn">マイページ</a>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn">ログアウト</button>
        </form>
        <a href="{{ route('items.create') }}" class="btn">出品する</a>
        @else
        <!-- ログイン前のヘッダー -->
        <form action="{{ route('items.search') }}" method="GET" class="search-form">
          <input type="text" name="query" placeholder="何をお探しですか？">
          <button type="submit">検索</button>
        </form>
        <a href="{{ route('login') }}" class="btn">ログイン</a>
        <a href="{{ route('register') }}" class="btn">会員登録</a>
        <a href="{{ route('items.create') }}" class="btn">出品する</a>
        @endif
      </div>
    </nav>
  </header>

  <main class="py-4">
    @yield('content')
  </main>
</body>

</html>