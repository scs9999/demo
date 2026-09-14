# Конференции.РФ

## Установка (на экзамене — с офлайн-сервера)
1. `composer create-project laravel/laravel conf` — создать базовый проект (пакеты берутся с офлайн-сервера).
2. Скопировать содержимое этой папки поверх созданного проекта (файлы `app/`, `database/`, `resources/`, `routes/web.php`, `README.md` — заменяют/дополняют то, что сгенерировал composer).
3. Настроить `.env`: `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` под общий сервер БД.
4. В `bootstrap/app.php` зарегистрировать middleware `admin` (файл создаёт composer, этой строки там по умолчанию нет):
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\IsAdmin::class,
    ]);
})
```
5. `php artisan migrate --seed` (или `migrate` + `php artisan db:seed`) — создаст только админа Conf2027/Demo77, таблица залов пустая — добавляй через `/admin/rooms/create`
6. Скопировать шрифты (PTSans-Regular.ttf, PTSans-Bold.ttf) в `public/fonts/`.
7. `php artisan storage:link` — без этого фото залов не будут показываться (папка `storage/app/public/rooms`).
8. `php artisan serve`

## Что где
- `database/migrations/` — таблицы users (+login, phone, is_admin), rooms, bookings (room_id → rooms)
- `app/Models/` — User, Room, Booking
- `app/Http/Middleware/IsAdmin.php` — проверка `is_admin` в одном месте (алиас `admin`, вешается на группу роутов, не в каждом методе контроллера)
- `app/Http/Requests/` — RegisterRequest, LoginRequest, BookingRequest, ReviewRequest, StatusRequest, RoomRequest
- `database/seeders/AdminSeeder.php` — создаёт пользователя-админа (login=Conf2027, password=Demo77, is_admin=true)
- `app/Http/Controllers/` — AuthController (общий вход — по `is_admin` редиректит на `/bookings` или `/admin/dashboard`), BookingController (заявки), AdminController (статусы заявок, п.5 задания), RoomController (главная страница со списком залов + CRUD залов у админа)
- `routes/web.php` — все маршруты
- `resources/views/` — каждая страница цельным HTML-файлом (без @extends/@section), стили подключены из `public/css/style.css` (без Bootstrap, палитра по гайду: #007bff, #0d47a1, #6c757d, #f8f9fa, шрифт PT Sans)
- `public/css/style.css` — общий стиль, `public/fonts/` — сюда положить PTSans-Regular.ttf / PTSans-Bold.ttf

## Залы
`/` — главная страница, список залов (публичная), карточки кликабельны.
`/rooms/{room}` — страница зала: фото, описание, отзывы (из заявок с непустым `review`).
`/admin/rooms` — список залов у админа, добавить/редактировать/удалить, в форме — фото (загрузка файла) и описание.
При создании заявки пользователь выбирает зал из `<select>` (а не вводит название текстом).

## Логика входа
Один вход (`/login`) для всех. Пароль хранится и сравнивается как есть, без хэша (`User::where('password', ...)`). После совпадения логина/пароля — `Auth::login($user)`, дальше редирект по `is_admin`:
- обычный пользователь → `/bookings`
- админ (сидированный Conf2027/Demo77) → `/admin/dashboard`
Отдельной страницы `/admin` больше нет.

## Логика статусов заявки
Новая → Мероприятие назначено / Завершено (меняет только админ).
Отзыв доступен пользователю только когда статус = Завершено.
