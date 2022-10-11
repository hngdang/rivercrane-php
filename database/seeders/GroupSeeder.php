<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('groups')->delete();

        \DB::table('groups')->insert([
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Reviewer',
            ],
            [
                'name' => 'Editor',
            ]
        ]);
    }
}
