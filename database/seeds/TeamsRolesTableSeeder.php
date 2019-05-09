<?php

use Illuminate\Database\Seeder;

class TeamsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TeamRole::class)->create( [
            'name' => 'admin'
        ] ) ;
        factory(App\TeamRole::class)->create( [
            'name' => 'user'
        ] ) ;
    }
}
