<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Конференции.РФ</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>Конференции.РФ</h1>
    <p>
        @if (auth()->check())
        @if (auth()->user()->is_admin)
        <a href="/admin/dashboard">Панель администратора</a>
        @else
        <a href="/bookings">Мои заявки</a>
        @endif
    <form method="POST" action="/logout" style="display:inline">@csrf<button>Выйти</button></form>
    @else
    <a href="/login">Войти</a>
    <a href="/register">Регистрация</a>
    @endif
    </p>
    <h2>Доступные залы</h2>
    @foreach ($rooms as $room)
    <div>
        <a href="/rooms/{{ $room->id }}">
            @if ($room->photo)
            <img src="/storage/{{ $room->photo }}" width="200">
            @endif
            <p>{{ $room->name }} — {{ $room->type }}</p>
        </a>
    </div>
    @endforeach
</body>

</html>