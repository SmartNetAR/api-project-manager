<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( App\Project::class )->create( [
            'name' => 'rbc',
            'description' => 'sistema resto bar'            
        ] ) ;

        factory( App\Project::class )->create( [
            'name' => 'pm',
            'description' => 'project manager'            
        ] ) ;

        factory( App\Project::class, 20 )->create() ;
    }
}
