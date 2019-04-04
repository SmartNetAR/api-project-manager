<?php

use Illuminate\Database\Seeder;

class RolesTeamsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_team_user')->insert([
            'user_id' => 1,
            'team_id' => 1,
            'role_id' => 1
        ]) ;

        DB::table('role_team_user')->insert([
            'user_id' => 2,
            'team_id' => 1,
            'role_id' => 2
        ]) ;
    }
}
