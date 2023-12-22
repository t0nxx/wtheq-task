<?php

namespace Database\Seeders;

use App\Enums\UserTypesEnum;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'normal user',
                'username' => 'normal_user',
                'email' => 'normal_user@mail.com',
                'password' => Hash::make('123456'),
                'type' => UserTypesEnum::normal,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'silver user',
                'username' => 'silver_user',
                'email' => 'silver_user@mail.com',
                'password' => Hash::make('123456'),
                'type' => UserTypesEnum::silver,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'gold user',
                'username' => 'gold_user',
                'email' => 'gold_user@mail.com',
                'password' => Hash::make('123456'),
                'type' => UserTypesEnum::gold,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
