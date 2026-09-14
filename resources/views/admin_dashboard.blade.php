<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Заявки</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Заявки</h1>
<p><a href="/">На главную</a></p>
<form method="POST" action="/logout">@csrf<button>Выйти</button></form>
<p><a href="/admin/rooms">Управление залами</a></p>
@foreach ($bookings as $b)
    <div>
        <p>{{ $b->user->name }} — {{ $b->room->name }} — {{ $b->date }} — {{ $b->status }}</p>
        <form method="POST" action="/admin/bookings/{{ $b->id }}/status">
            @csrf
            <input type="hidden" name="status" value="Мероприятие назначено">
            <button>Назначить</button>
        </form>
        <form method="POST" action="/admin/bookings/{{ $b->id }}/status">
            @csrf
            <input type="hidden" name="status" value="Завершено">
            <button>Завершить</button>
        </form>
    </div>
@endforeach
</body>
</html>
