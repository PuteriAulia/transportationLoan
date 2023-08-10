<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                'name' => 'gunawan indra',
                'email'=> 'gunawan@gmail.com',
                'password'=> Hash::make('kepalacabang123'),
                'employee_id'=> 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        User::insert(
            [
                'name' => 'ananta bagus',
                'email'=> 'ananta@gmail.com',
                'password'=> Hash::make('kepalapusat123'),
                'employee_id'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        User::insert(
            [
                'name' => 'joko suwarno',
                'email'=> 'joko@gmail.com',
                'password'=> Hash::make('kepaladepartemenumum123'),
                'employee_id'=> 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ] 
        );

        User::insert(
            [
                'name' => 'agus halis',
                'email'=> 'agus@gmail.com',
                'password'=> Hash::make('kepaladepartemenumum123'),
                'employee_id'=> 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        User::insert(
            [
                'name' => 'annisa gian',
                'email'=> 'annisa@gmail.com',
                'password'=> Hash::make('kepaladepartemenpemasaran123'),
                'employee_id'=> 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        User::insert(
            [
                'name' => 'anna gian',
                'email'=> 'anna@gmail.com',
                'password'=> Hash::make('kepaladepartemenkeuangan123'),
                'employee_id'=> 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        User::insert(
            [
                'name' => 'juan marrtin',
                'email'=> 'juan@gmail.com',
                'password'=> Hash::make('kepaladepartementeknologi123'),
                'employee_id'=> 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
