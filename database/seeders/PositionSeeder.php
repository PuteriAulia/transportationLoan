<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::insert(
            [
                'code' => 'PS001',
                'name' => 'kepala pusat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Position::insert(
            [
                'code' => 'PS002',
                'name' => 'kepala cabang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Position::insert(
            [
                'code' => 'PS003', 
                'name' => 'kepala departemen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Position::insert(
            [
                'code' => 'PS004',
                'name' => 'staff',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
