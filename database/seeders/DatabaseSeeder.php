<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Schedule;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin POSBANKUM',
            'email' => 'admin@pulaugadang.desa.id',
            'password' => bcrypt('password123'),
        ]);

        $schedules = [
            ['day' => 'Senin', 'start_time' => '08:00', 'end_time' => '16:00', 'location' => 'Kantor Desa Pulau Gadang', 'is_active' => true],
            ['day' => 'Selasa', 'start_time' => '08:00', 'end_time' => '16:00', 'location' => 'Kantor Desa Pulau Gadang', 'is_active' => true],
            ['day' => 'Rabu', 'start_time' => '08:00', 'end_time' => '16:00', 'location' => 'Kantor Desa Pulau Gadang', 'is_active' => true],
            ['day' => 'Kamis', 'start_time' => '08:00', 'end_time' => '16:00', 'location' => 'Kantor Desa Pulau Gadang', 'is_active' => true],
            ['day' => 'Jumat', 'start_time' => '08:00', 'end_time' => '16:00', 'location' => 'Kantor Desa Pulau Gadang', 'is_active' => true],
            ['day' => 'Sabtu', 'start_time' => '08:00', 'end_time' => '12:00', 'location' => 'Kantor Desa Pulau Gadang', 'is_active' => true],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}