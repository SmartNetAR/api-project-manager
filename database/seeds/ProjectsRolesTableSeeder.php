<?php

use Illuminate\Database\Seeder;

class ProjectsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( App\ProjectRole::class )->create( [
            'name' => 'dev'
        ] ) ;

        factory( App\ProjectRole::class )->create( [
            'name' => 'ux'
        ] ) ;
    }
}
