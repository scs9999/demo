<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Новая заявка</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>Новая заявка</h1>
    <p><a href="/bookings">Назад к заявкам</a> <a href="/">На главную</a></p>
    <form method="POST" action="/bookings">
        @csrf
        <select name="room_id">
            @foreach ($rooms as $room)
            <option value="{{ $room->id }}" @selected(old('room_id')==$room->id)>{{ $room->name }} ({{ $room->type }})</option>
            @endforeach
        </select>
        <input name="date" type="datetime-local" value="{{ old('date') }}">
        <select name="payment">
            <option value="Очно" @selected(old('payment')=='Очно' )>Очно</option>
            <option value="СБП" @selected(old('payment')=='СБП' )>СБП</option>
        </select>
        <button>Отправить</button>
    </form>
    @if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
</body>

</html>