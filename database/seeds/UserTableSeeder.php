<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@birgurkha.com',
                'password' => bcrypt('admin@123')
            ]
        ];

        DB::table('users')->insert($types);
    }
}
