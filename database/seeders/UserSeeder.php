<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            [
                'name' => 'Trần Hoàng Đăng',
                'email' => 'tran.dang.rcvn2012@gmail.com',
                'password' => bcrypt(12345678),
                'last_login_ip' => 'localhost',
                'group_role' => '1'
            ]
        ]);
    }
}
