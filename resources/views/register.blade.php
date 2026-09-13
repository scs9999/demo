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
        <input name="password" type="password" placeholder="Пароль">
        <input name="name" placeholder="ФИО" value="{{ old('name') }}">
        <input name="phone" placeholder="8(XXX)XXX-XX-XX" value="{{ old('phone') }}">
        <input name="email" placeholder="Email" value="{{ old('email') }}">
        <button>Создать пользователя</button>
    </form>
    <a href="/login">Уже зарегистрированы? Войти</a>
    @if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
</body>

</html>