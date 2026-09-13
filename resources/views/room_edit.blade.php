<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Редактировать зал</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>Редактировать зал</h1>
    <p><a href="/admin/rooms">Назад к залам</a> <a href="/">На главную</a></p>
    @if ($room->photo)
    <img src="/storage/{{ $room->photo }}" width="200">
    @endif
    <form method="POST" action="/admin/rooms/{{ $room->id }}" enctype="multipart/form-data">
        @csrf
        <input name="name" placeholder="Название" value="{{ old('name', $room->name) }}">
        <select name="type">
            <option value="Аудитория" @selected(old('type', $room->type) == 'Аудитория')>Аудитория</option>
            <option value="Коворкинг" @selected(old('type', $room->type) == 'Коворкинг')>Коворкинг</option>
            <option value="Кинозал" @selected(old('type', $room->type) == 'Кинозал')>Кинозал</option>
        </select>
        <textarea name="description" placeholder="Описание">{{ old('description', $room->description) }}</textarea>
        <input type="file" name="photo">
        <button>Сохранить</button>
    </form>
    @if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
</body>

</html>