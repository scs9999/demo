<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $room->name }}</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <p><a href="/">На главную</a></p>
    <h1>{{ $room->name }}</h1>
    <p class="small">{{ $room->type }}</p>
    @if ($room->photo)
    <img src="/storage/{{ $room->photo }}" width="400">
    @endif
    <p>{{ $room->description }}</p>

    <h2>Отзывы</h2>
    @forelse ($reviews as $r)
    <p>{{ $r->user->name }}: {{ $r->review }}</p>
    @empty
    <p class="small">Пока нет отзывов</p>
    @endforelse
</body>

</html>