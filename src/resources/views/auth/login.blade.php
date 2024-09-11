<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
</head>

<body>
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <label for="email">メール:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">パスワード:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">ログイン</button>
  </form>
  <p>アカウントをお持ちでない方は <a href="{{ route('register') }}">こちらから登録</a> してください。</p>
</body>

</html>