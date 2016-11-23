<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'moses asiago',
                'email' => 'moses@app.com',
                'password' => Hash::make('123456789')
            ]
        ];
        foreach ($users as $user) {
            \App\User::create($user);
        }
    }
}
