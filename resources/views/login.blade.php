<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Вход</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Вход</h1>
<p><a href="/">На главную</a></p>
<form method="POST" action="/login">
    @csrf
    <input name="login" placeholder="Логин">
    @error('login')
        <div class="err">{{ $message }}</div>
    @enderror

    <input name="password" type="password" placeholder="Пароль">
    @error('password')
        <div class="err">{{ $message }}</div>
    @enderror

    <button>Войти</button>
</form>
<a href="/register">Еще не зарегистрированы? Регистрация</a>
</body>
</html>
