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
        <input name="password" type="password" placeholder="Пароль">
        <button>Войти</button>
    </form>
    <a href="/register">Еще не зарегистрированы? Регистрация</a>
    @if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
</body>

</html>