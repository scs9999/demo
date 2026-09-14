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
    @error('name')
        <div class="err">{{ $message }}</div>
    @enderror

    <select name="type">
        <option value="Аудитория" @selected(old('type', $room->type) == 'Аудитория')>Аудитория</option>
        <option value="Коворкинг" @selected(old('type', $room->type) == 'Коворкинг')>Коворкинг</option>
        <option value="Кинозал" @selected(old('type', $room->type) == 'Кинозал')>Кинозал</option>
    </select>
    @error('type')
        <div class="err">{{ $message }}</div>
    @enderror

    <textarea name="description" placeholder="Описание">{{ old('description', $room->description) }}</textarea>
    @error('description')
        <div class="err">{{ $message }}</div>
    @enderror

    <input type="file" name="photo" accept="image/*">
    @error('photo')
        <div class="err">{{ $message }}</div>
    @enderror

    <button>Сохранить</button>
</form>
</body>
</html>
