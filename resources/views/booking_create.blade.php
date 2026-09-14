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
            <option value="{{ $room->id }}" @selected(old('room_id') == $room->id)>{{ $room->name }} ({{ $room->type }})</option>
        @endforeach
    </select>
    @error('room_id')
        <div class="err">{{ $message }}</div>
    @enderror

    <input name="date" type="datetime-local" value="{{ old('date') }}" min="{{ now()->format('Y-m-d\TH:i') }}">
    @error('date')
        <div class="err">{{ $message }}</div>
    @enderror

    <select name="payment">
        <option value="Очно" @selected(old('payment') == 'Очно')>Очно</option>
        <option value="СБП" @selected(old('payment') == 'СБП')>СБП</option>
    </select>
    @error('payment')
        <div class="err">{{ $message }}</div>
    @enderror

    <button>Отправить</button>
</form>
</body>
</html>
