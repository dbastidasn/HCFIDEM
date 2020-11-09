<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresa')->insert([

            'nombre'=>'AQUAPROGRAMMER', 
            'tipo_documento'=>'NIT', 
            'documento'=>1130629762,
            'activo'=>'1',
                       

        ]);
        
        DB::table('empleado')->insert([

            'nombres'=>'Jhonnathan', 
            'apellidos'=>'Castro Galeano',
            'tipo_documento'=>'CC',
            'documento'=>1130629762,
            'pais'=>'Colombia', 
            'ciudad'=>'Cali', 
            'barrio'=>'Marroquin 1', 
            'direccion'=>'Cra 26', 
            'celular'=>'3175018125', 
            'telefono'=>'5243909', 
            'activo'=>'1',
            'empresa_id'=>1
            

        ]);

        DB::table('empleado')->insert([

            
            'nombres'=>'Juan Diego', 
            'apellidos'=>'Castro',
            'tipo_documento'=>'CC',
            'documento'=>123456789,
            'pais'=>'Colombia', 
            'ciudad'=>'Cali', 
            'barrio'=>'Calibella', 
            'direccion'=>'Cra 7', 
            'celular'=>'3001234567', 
            'telefono'=>'5243900', 
            'activo'=>'1',
            'empresa_id'=>1
            

        ]);
        
        DB::table('usuario')->insert([

            'usuario'=>'jcastro', 
            'password'=>bcrypt('123456'),
            'remenber_token'=>bcrypt('123456'),
            'tipo_de_usuario'=>'office', 
            'email'=>'castrokof@gmail.com',
            'activo'=>1,
            'empleado_id'=>1
            

        ]);
        
        DB::table('usuario')->insert([

            'usuario'=>'jdcastro', 
            'password'=>bcrypt('123456'),
            'remenber_token'=>bcrypt('123456'),
            'tipo_de_usuario'=>'office', 
            'email'=>'jdcastro@gmail.com',
            'activo'=>1,
            'empleado_id'=>2

        ]);

        DB::table('usuario_rol')->insert([

            'rol_id'=>1, 
            'usuario_id'=>1, 
             
                      

        ]);
        DB::table('usuario_rol')->insert([

            'rol_id'=>1, 
            'usuario_id'=>2, 
             
                      

        ]);
    }
}
