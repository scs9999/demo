<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Мои заявки</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>Мои заявки</h1>
    <p><a href="/">На главную</a></p>
    <a href="/bookings/create">Новая заявка</a>
    @foreach ($bookings as $b)
    <div>
        <p>{{ $b->room->name }} — {{ $b->date }} — {{ $b->payment }} — {{ $b->status }}</p>
        @if ($b->status == 'Завершено')
        <form method="POST" action="/bookings/{{ $b->id }}/review">
            @csrf
            <input name="review" placeholder="Отзыв" value="{{ $b->review }}">
            <button>Оставить отзыв</button>
        </form>
        @endif
    </div>
    @endforeach
    <form method="POST" action="/logout">@csrf<button>Выйти</button></form>
</body>

</html>