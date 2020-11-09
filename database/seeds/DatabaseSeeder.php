<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([

            'rol',
            'empresa',
            'empleado',
            'usuario',
            'usuario_rol'

        ]


        );
     
        // $this->call(UsersTableSeeder::class);
    
            $this->call(RolTablaSeeder::class);
            $this->call(UsuarioAdministradorSeeder::class);
    }

    protected function truncateTablas(array $tablas){

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');


    }

}
