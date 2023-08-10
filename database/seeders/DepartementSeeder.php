<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Departement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departement::insert(
            [
                'code' => 'DP001',
                'name' => 'teknologi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Departement::insert(
            [
                'code' => 'DP002',
                'name' => 'keuangan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Departement::insert(
            [
                'code' => 'DP003',
                'name' => 'pemasaran',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Departement::insert(
            [
                'code' => 'DP004',
                'name' => 'umum',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
