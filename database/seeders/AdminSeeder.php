<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Администратор',
            'login' => 'Conf2027',
            'phone' => '8(000)000-00-00',
            'email' => 'admin@conf.ru',
            'password' => bcrypt('Demo77'),
            'is_admin' => true,
        ]);
    }
}
