<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creamos el usuario administrador

        DB::table('users')->insert([
            'name' => 'ADMINISTRADOR',
            'email' => 'contabilidad@coodescor.org.co',
            'password' => bcrypt('ContabilidadAdmin'),
            'area' => 'Administracion',
            'co' => '001',
            'nick' => 'ADMIN',
        ]);
    }
}
