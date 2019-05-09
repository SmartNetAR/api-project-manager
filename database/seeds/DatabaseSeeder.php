<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables(['users', 'team_roles', 'teams']) ;

        $this->call(UsersTableSeeder::class);

        $this->call(TeamsRolesTableSeeder::class);

        $this->call(TeamsTableSeeder::class);

        $this->call(RolesTeamsUsersTableSeeder::class);

        $this->call(ProjectsTableSeeder::class);

        $this->call(ProjectsRolesTableSeeder::class);
    }

    public function truncateTables(array $tables) {
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
