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
        $this->truncateTables(['users', 'roles', 'teams']) ;

        $this->call(UsersTableSeeder::class);

        $this->call(RolesTableSeeder::class);

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
