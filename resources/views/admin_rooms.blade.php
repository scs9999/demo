<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Залы</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Залы</h1>
<p><a href="/">На главную</a> <a href="/admin/dashboard">К заявкам</a> <a href="/admin/rooms/create">Добавить зал</a></p>
@foreach ($rooms as $room)
    <div>
        <p>
            {{ $room->name }} — {{ $room->type }}
            <a href="/admin/rooms/{{ $room->id }}/edit">Редактировать</a>
        </p>
        <form method="POST" action="/admin/rooms/{{ $room->id }}/delete">
            @csrf
            <button>Удалить</button>
        </form>
    </div>
@endforeach
</body>
</html>
