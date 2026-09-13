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
        <select name="type">
            <option value="Аудитория" @selected(old('type')=='Аудитория' )>Аудитория</option>
            <option value="Коворкинг" @selected(old('type')=='Коворкинг' )>Коворкинг</option>
            <option value="Кинозал" @selected(old('type')=='Кинозал' )>Кинозал</option>
        </select>
        <textarea name="description" placeholder="Описание">{{ old('description') }}</textarea>
        <input type="file" name="photo">
        <button>Сохранить</button>
    </form>
    @if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
</body>

</html>