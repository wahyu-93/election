<?php

namespace Database\Seeders;

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
        User::create([
            'nik'   => '6302061010101010',
            'name'  => 'Wahyu',
            'email' => 'wahyu@election.com',
            'password' => bcrypt('wahyu1993')
        ]);
    }
}
