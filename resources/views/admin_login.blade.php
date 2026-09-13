<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Вход администратора</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>Вход администратора</h1>
    <form method="POST" action="/admin">
        @csrf
        <input name="login" placeholder="Логин">
        <input name="password" type="password" placeholder="Пароль">
        <button>Войти</button>
    </form>
    @if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
</body>

</html>