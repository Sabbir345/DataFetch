<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Fultali Admin',
                'email' => 'admin@darulqiratfultali.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'Sudipto Chowdhury',
                'email' => 'dip.authlab@gmail.com',
                'password' => bcrypt('dip123'),
            ],
        ];

        DB::table('users')->insert($data);

    }
}
