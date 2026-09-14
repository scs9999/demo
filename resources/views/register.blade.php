<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Регистрация</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Регистрация</h1>
<p><a href="/">На главную</a></p>
<form method="POST" action="/register">
    @csrf
    <input name="login" placeholder="Логин" value="{{ old('login') }}">
    @error('login')
        <div class="err">{{ $message }}</div>
    @enderror

    <input name="password" type="password" placeholder="Пароль">
    @error('password')
        <div class="err">{{ $message }}</div>
    @enderror

    <input name="name" placeholder="ФИО" value="{{ old('name') }}">
    @error('name')
        <div class="err">{{ $message }}</div>
    @enderror

    <input name="phone" placeholder="8(XXX)XXX-XX-XX" value="{{ old('phone') }}">
    @error('phone')
        <div class="err">{{ $message }}</div>
    @enderror

    <input name="email" placeholder="Email" value="{{ old('email') }}">
    @error('email')
        <div class="err">{{ $message }}</div>
    @enderror

    <button>Создать пользователя</button>
</form>
<a href="/login">Уже зарегистрированы? Войти</a>
</body>
</html>
