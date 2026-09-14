<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Добавить зал</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Добавить зал</h1>
<p><a href="/admin/rooms">Назад к залам</a> <a href="/">На главную</a></p>
<form method="POST" action="/admin/rooms" enctype="multipart/form-data">
    @csrf
    <input name="name" placeholder="Название" value="{{ old('name') }}">
    @error('name')
        <div class="err">{{ $message }}</div>
    @enderror

    <select name="type">
        <option value="Аудитория" @selected(old('type') == 'Аудитория')>Аудитория</option>
        <option value="Коворкинг" @selected(old('type') == 'Коворкинг')>Коворкинг</option>
        <option value="Кинозал" @selected(old('type') == 'Кинозал')>Кинозал</option>
    </select>
    @error('type')
        <div class="err">{{ $message }}</div>
    @enderror

    <textarea name="description" placeholder="Описание">{{ old('description') }}</textarea>
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
