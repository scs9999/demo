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

<h2>Комментарии</h2>
@forelse ($comments as $c)
    <p>{{ $c->user->name }}: {{ $c->text }}</p>
@empty
    <p class="small">Пока нет комментариев</p>
@endforelse

@auth
    <form method="POST" action="/rooms/{{ $room->id }}/comments">
        @csrf
        <input name="text" placeholder="Ваш комментарий">
        @error('text')
            <div class="err">{{ $message }}</div>
        @enderror
        <button>Отправить</button>
    </form>
@else
    <p class="small"><a href="/login">Войдите</a>, чтобы оставить комментарий</p>
@endauth
</body>
</html>
