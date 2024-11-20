<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('flights')->insert([
            ['flight_code' => 'SA601', 'origin' => 'SUB', 'destination' => 'SIN', 'departure_time' => '2024-10-15 13:00', 'arrival_time' => '2024-10-15 16:00'],
            ['flight_code' => 'JT501', 'origin' => 'SUB', 'destination' => 'CGK', 'departure_time' => '2024-10-15 13:00', 'arrival_time' => '2024-10-15 16:00'],
            ['flight_code' => 'QZ300', 'origin' => 'DPS', 'destination' => 'KUL', 'departure_time' => '2024-10-15 08:00', 'arrival_time' => '2024-10-15 11:00'],
            ['flight_code' => 'GA800', 'origin' => 'CGK', 'destination' => 'SYD', 'departure_time' => '2024-10-16 06:00', 'arrival_time' => '2024-10-16 14:00'],
            ['flight_code' => 'MH102', 'origin' => 'KUL', 'destination' => 'BKK', 'departure_time' => '2024-10-17 09:00', 'arrival_time' => '2024-10-17 11:00'],
        ]);
    }
}
