<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class)->create( [
            'name' => 'admin'
        ] ) ;
        factory(App\Role::class)->create( [
            'name' => 'user'
        ] ) ;
        // DB::table('roles')->insert([
        //     'name' => 'admin'
        // ]);
        // DB::table('roles')->insert([
        //     'name' => 'user'
        // ]);
    }
}
