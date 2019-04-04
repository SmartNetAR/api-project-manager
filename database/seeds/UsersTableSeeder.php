<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::create([
            'nick' => 'Leo',
            'email' => 'leonardo@smartnet.com.ar',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
        ]));
        factory(App\User::create([
            'nick' => 'Luis',
            'email' => 'luis@smartnet.com.ar',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]));
    }
}

/*
        $input['password'] = bcrypt($input['password']); // bcrypt($request->get('password'));
        $user = User::create($input);
        $token =  $user->createToken('ProjectManager')->accessToken;/*
