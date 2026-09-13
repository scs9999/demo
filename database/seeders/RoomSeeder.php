<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::create(['name' => 'Аудитория 101', 'type' => 'Аудитория']);
        Room::create(['name' => 'Коворкинг «Восток»', 'type' => 'Коворкинг']);
        Room::create(['name' => 'Кинозал «Центральный»', 'type' => 'Кинозал']);
    }
}
