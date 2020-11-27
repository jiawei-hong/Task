<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'username' => '管理員',
            'account' => 'admin',
            'password' => Hash::make('1234'),
            'permission' => '管理員'
        ]);

        User::create([
            'username' => '測試員1號',
            'account' => 'test1',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'username' => '測試員2號',
            'account' => 'test2',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'username' => '測試員3號',
            'account' => 'test3',
            'password' => Hash::make('1234'),
        ]);
    }
}
