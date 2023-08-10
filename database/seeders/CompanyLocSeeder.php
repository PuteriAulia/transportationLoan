<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\CompLoc;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanyLocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompLoc::insert(
            [
                'code' => 'KP001',
                'name' => 'kantor pusat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        CompLoc::insert(
            [
                'code' => 'KC001',
                'name' => 'kantor cabang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        CompLoc::insert(
            [
                'code' => 'KL001',
                'name' => 'lapangan 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        CompLoc::insert(
            [
                'code' => 'KL002',
                'name' => 'lapangan 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        CompLoc::insert(
            [
                'code' => 'KL003',
                'name' => 'lapangan 3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        CompLoc::insert(
            [
                'code' => 'KL004',
                'name' => 'lapangan 4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        CompLoc::insert(
            [
                'code' => 'KL005',
                'name' => 'lapangan 5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        CompLoc::insert(
            [
                'code' => 'KL006',
                'name' => 'lapangan 6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
