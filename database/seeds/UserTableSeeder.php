<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::truncate();

        User::create([
            'user_name' => 'manager',
            'email' => 'manager@gmail.com',
            'role_id' => User::ROLE_MANAGER,
            'password' => bcrypt('123123123'),
            'is_active' => User::IS_ACTIVE,
        ]);

        User::create([
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => User::ROLE_ADMIN,
            'password' => bcrypt('123123123'),
            'is_active' => User::IS_ACTIVE,
        ]);


        User::create([
            'user_name' => 'sale',
            'email' => 'sale@gmail.com',
            'role_id' => User::ROLE_SALE,
            'password' => bcrypt('123123123'),
            'is_active' => User::IS_ACTIVE,
        ]);
    }
}
