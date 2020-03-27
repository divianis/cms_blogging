<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::where('email', 'divianisok@gmail.com')->get(); // collection, bisa banyak user dengan email ini
        $user = User::where('email', 'divianisok@gmail.com')->first(); // hanya satu user

        if (!$user) {
            User::create([
                'name' => 'Divianis Oktaviyani',
                'email' => 'divianisok@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('11111111')
            ]);
        }
    }
}
