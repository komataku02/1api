<!DOCTYPE html>
<html>

<head>
  <title>会員登録</title>
</head>

<body>
  <form action="{{ route('register') }}" method="POST">
    @csrf
    <label for="name">名前:</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">メール:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">パスワード:</label>
    <input type="password" name="password" required>
    <br>
    <label for="password_confirmation">パスワード(確認用):</label>
    <input type="password" name="password_confirmation" required>
    <br>
    <button type="submit">会員登録</button>
  </form>
  <p>すでにアカウントをお持ちの方は <a href="{{ route('login') }}">こちらからログイン</a> してください。</p>
</body>

</html>