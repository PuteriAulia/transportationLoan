<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert(
            [
                'code' => 'EMP001',
                'name' => 'ananta bagus',
                'gender' => 'laki-laki',
                'phone' => '081236521458',
                'position_id' => 1,
                'departement_id' => 1,
                'company_loc_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP002',
                'name' => 'gunawan indra',
                'gender' => 'laki-laki',
                'phone' => '081236529878',
                'position_id' => 2,
                'departement_id' => 2,
                'company_loc_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP003',
                'name' => 'annisa gian',
                'gender' => 'perempuan',
                'phone' => '081324587547',
                'position_id' => 3, 
                'departement_id' => 3,
                'company_loc_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP004',
                'name' => 'anna gian',
                'gender' => 'perempuan',
                'phone' => '081324587547',
                'position_id' => 3,
                'departement_id' => 2,
                'company_loc_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP005',
                'name' => 'juan martin',
                'gender' => 'laki-laki',
                'phone' => '081324587547',
                'position_id' => 3,
                'departement_id' => 1,
                'company_loc_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP006',
                'name' => 'sintia',
                'gender' => 'perempuan',
                'phone' => '081362547896',
                'position_id' => 4,
                'departement_id' => 1,
                'company_loc_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP007',
                'name' => 'indra warno',
                'gender' => 'laki-laki',
                'phone' => '081362544587',
                'position_id' => 4,
                'departement_id' => 2,
                'company_loc_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP008',
                'name' => 'putri rafika',
                'gender' => 'perempuan',
                'phone' => '081362896587',
                'position_id' => 4,
                'departement_id' => 3,
                'company_loc_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP009',
                'name' => 'aditya wisnu',
                'gender' => 'laki-laki',
                'phone' => '081362825897',
                'position_id' => 4,
                'departement_id' => 1,
                'company_loc_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP010',
                'name' => 'Ffisal hanif',
                'gender' => 'laki-laki',
                'phone' => '081345823897',
                'position_id' => 4,
                'departement_id' => 2,
                'company_loc_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP011',
                'name' => 'lula ivonia',
                'gender' => 'perempuan',
                'phone' => '081345829568',
                'position_id' => 4,
                'departement_id' => 3,
                'company_loc_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP012',
                'name' => 'joko suwarno',
                'gender' => 'laki-laki',
                'phone' => '081345889568',
                'position_id' => 3,
                'departement_id' => 4,
                'company_loc_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        Employee::insert(
            [
                'code' => 'EMP013',
                'name' => 'agus halis',
                'gender' => 'laki-laki',
                'phone' => '081345897568',
                'position_id' => 3,
                'departement_id' => 4,
                'company_loc_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
