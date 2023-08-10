<?php

namespace Database\Seeders;

use App\Models\Transportation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransportationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transportation::insert([
                'plate' => 'W 0234 KL',
                'ownership' => 'sendiri',
                'merk' => 'daihatsu',
                'type' => 'mobil',
                'colour' => 'hitam',
                'status' => 'tersedia',
                'type_payload' => 'angkutan orang',
                'company_loc_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'W 2564 KO',
            'ownership' => 'sewa',
            'merk' => 'daihatsu',
            'type' => 'mobil',
            'colour' => 'silver',
            'status' => 'tersedia',
            'type_payload' => 'angkutan orang',
            'company_loc_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'L 6544 XY',
            'ownership' => 'sendiri',
            'merk' => 'honda',
            'type' => 'sepeda motor',
            'colour' => 'putih biru',
            'status' => 'tersedia',
            'type_payload' => 'angkutan orang',
            'company_loc_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'L 6555 XY',
            'ownership' => 'sendiri',
            'merk' => 'honda',
            'type' => 'moobil',
            'colour' => 'hitam',
            'status' => 'tersedia',
            'type_payload' => 'angkutan orang',
            'company_loc_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'L 8844 OA',
            'ownership' => 'sendiri',
            'merk' => 'toyota',
            'type' => 'mobil',
            'colour' => 'hitam',
            'status' => 'tersedia',
            'type_payload' => 'angkutan orang',
            'company_loc_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'L 6895 YT',
            'ownership' => 'sewa',
            'merk' => 'yamaha',
            'type' => 'sepeda motor',
            'colour' => 'hitam',
            'status' => 'tersedia',
            'type_payload' => 'angkutan orang',
            'company_loc_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'W 9658 PO',
            'ownership' => 'sendiri',
            'merk' => 'daihatsu',
            'type' => 'mobil',
            'colour' => 'silver',
            'status' => 'tersedia',
            'type_payload' => 'angkutan orang',
            'company_loc_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'W 9665 PO',
            'ownership' => 'sendiri',
            'merk' => 'honda',
            'type' => 'mobil',
            'colour' => 'silver',
            'status' => 'tersedia',
            'type_payload' => 'angkutan orang',
            'company_loc_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'W 9687 UY',
            'ownership' => 'sewa',
            'merk' => 'daihatsu',
            'type' => 'mobil',
            'colour' => 'hitam',
            'status' => 'tersedia',
            'type_payload' => 'angkutan barang',
            'company_loc_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'W 9857 UX',
            'ownership' => 'sewa',
            'merk' => 'mitsubishi',
            'type' => 'truk',
            'colour' => 'kuning',
            'status' => 'tersedia',
            'type_payload' => 'angkutan barang',
            'company_loc_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'L 9987 TX',
            'ownership' => 'sewa',
            'merk' => 'mitsubishi',
            'type' => 'truk',
            'colour' => 'kuning',
            'status' => 'tersedia',
            'type_payload' => 'angkutan barang',
            'company_loc_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);

        Transportation::insert([
            'plate' => 'W 6557 FD',
            'ownership' => 'sendiri',
            'merk' => 'mitsubishi',
            'type' => 'truk',
            'colour' => 'hijau',
            'status' => 'tersedia',
            'type_payload' => 'angkutan barang',
            'company_loc_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'active' => 'active',
        ]);
    }
}
