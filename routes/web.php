<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }




/* RUTAS IMAGENES TEXTO */

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
//Route::get('/', 'Admin\InicioController@index')->name('inicio');
Route::get('/', 'Seguridad\LoginController@index')->name('inicio');
Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {
     
     
     /* RUTAS DEL MENU */
     Route::get('menu', 'MenuController@index')->name('menu');
     Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
     Route::get('menu/{id}/editar', 'MenuController@editar')->name('editar_menu');
     Route::put('menu/{id}', 'MenuController@actualizar')->name('actualizar_menu');
     Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
     Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
     Route::get('rol/{id}/elimniar', 'MenuController@eliminar')->name('eliminar_menu');
    
     /* RUTAS DEL ROL */
     Route::get('rol', 'RolController@index')->name('rol');
     Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
     Route::post('rol', 'RolController@guardar')->name('guardar_rol');
     Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');
     Route::put('rol/{id}', 'RolController@actualizar')->name('actualizar_rol');
     Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar_rol');
    
     /* RUTAS DEL MENUROL */
     Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol');
     Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol');
     
     /* RUTAS DE LA EMPRESA */
     Route::get('empresa', 'EmpresaController@index')->name('empresa');
     Route::get('empresa/crear', 'EmpresaController@crear')->name('crear_empresa');
     Route::post('empresa', 'EmpresaController@guardar')->name('guardar_empresa');
     Route::get('empresa/{id}/editar', 'EmpresaController@editar')->name('editar_empresa');
     Route::put('empresa/{id}', 'EmpresaController@actualizar')->name('actualizar_empresa');

     /* RUTAS DEL PERMISO */
     Route::get('permiso', 'PermisoController@index')->name('permiso');
     Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
     Route::post('permiso', 'PermisoController@guardar')->name('guardar_permiso');
     Route::get('permiso/{id}/editar', 'PermisoController@editar')->name('editar_permiso');
     Route::put('permiso/{id}', 'PermisoController@actualizar')->name('actualizar_permiso');
     Route::delete('permiso/{id}', 'PermisoController@eliminar')->name('eliminar_permiso');
     
     /* RUTAS DEL PERMISOROL */
     Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso_rol');
     Route::post('permiso-rol', 'PermisoRolController@guardar')->name('guardar_permiso_rol');


   
});


Route::group(['middleware' => ['auth']], function () {

Route::get('/tablero', 'AdminController@index')->name('tablero');

/* RUTAS DEL USUARIO */
Route::get('usuario', 'UsuarioController@index')->name('usuario')->middleware('superConsultor');
Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario')->middleware('superEditor');
Route::post('usuario', 'UsuarioController@guardar')->name('guardar_usuario')->middleware('superEditor');
Route::get('usuario/{id}/editar', 'UsuarioController@editar')->name('editar_usuario')->middleware('superEditor');
Route::get('usuario/{id}/password', 'UsuarioController@editarpassword')->name('editar_password')->middleware('superEditor');
Route::put('usuario/{id}', 'UsuarioController@actualizar')->name('actualizar_usuario')->middleware('superEditor');
Route::put('password/{id}', 'UsuarioController@actualizarpassword')->name('actualizar_password')->middleware('superEditor');


/* RUTAS DEL EMPLEADO */
Route::get('empleado', 'empleadoController@index')->name('empleado')->middleware('superEditor');
Route::get('empleado/crear', 'empleadoController@crear')->name('crear_empleado')->middleware('superEditor');
Route::post('empleado', 'empleadoController@guardar')->name('guardar_empleado')->middleware('superEditor');
Route::get('empleado/{id}/editar', 'empleadoController@editar')->name('editar_empleado')->middleware('superEditor');
Route::put('empleado/{id}', 'empleadoController@actualizar')->name('actualizar_empleado')->middleware('superEditor');

/* RUTAS DEL CLIENTE */
Route::get('cliente', 'clienteController@index')->name('cliente')->middleware('superEditor');
Route::get('cliente/crear', 'clienteController@crear')->name('crear_cliente')->middleware('superEditor');
Route::post('cliente', 'clienteController@guardar')->name('guardar_cliente')->middleware('superEditor');
Route::get('cliente/{id}/editar', 'clienteController@editar')->name('editar_cliente')->middleware('superEditor');
Route::put('cliente/{id}', 'clienteController@actualizar')->name('actualizar_cliente')->middleware('superEditor');

/* RUTAS DEL PRESTAMO */
Route::get('prestamo', 'prestamoController@index')->name('prestamo')->middleware('superEditor');
Route::get('prestamo/crear', 'prestamoController@crear')->name('crear_prestamo')->middleware('superEditor');
Route::post('prestamo', 'prestamoController@guardar')->name('guardar_prestamo')->middleware('superEditor');
Route::get('prestamo/{id}/editar', 'prestamoController@editar')->name('editar_prestamo')->middleware('superEditor');
Route::get('prestamo/{id}', 'prestamoController@detalle')->name('detalle_prestamo')->middleware('superEditor');
Route::put('prestamo/{id}', 'prestamoController@actualizar')->name('actualizar_prestamo')->middleware('superEditor');


/* RUTAS DEL PAGO */
Route::get('pago', 'pagoController@index')->name('pago')->middleware('superEditor');
Route::get('pago/crear', 'pagoController@crear')->name('crear_pago')->middleware('superEditor');
Route::post('pago', 'pagoController@guardar')->name('guardar_pago')->middleware('superEditor');
Route::get('pago/{id}/editar', 'pagoController@editar')->name('editar_pago')->middleware('superEditor');
Route::put('pago/{id}', 'pagoController@actualizar')->name('actualizar_pago')->middleware('superEditor');


/* RUTAS DEL USUARIO NO ADMIN PARA CONTRASEÑA */
Route::put('password1/{id}', 'UsuarioController@actualizarpassword1')->name('actualizar_password1');

/* RUTAS DEL ARCHIVO y ENTRADA */
Route::get('archivo', 'ArchivoController@index')->name('archivo')->middleware('superConsultor');
Route::post('guardar', 'EntradaController@guardar')->name('subir_archivo')->middleware('superEditor');

/* RUTAS DE ASIGNACION */
Route::get('asignacion', 'OrdenesmtlasignarController@index')->name('asignacion')->middleware('superEditor');
Route::post('asignacion_orden', 'OrdenesmtlasignarController@actualizar')->name('actualizar_asignacion')->middleware('superEditor');
Route::post('desasignacion_orden', 'OrdenesmtlasignarController@desasignar')->name('desasignar_asignacion')->middleware('superEditor');
Route::get('idDivision', 'OrdenesmtlasignarController@idDivisionss')->name('idDivisionsss')->middleware('superEditor');
/* DETALLE DE ORDENES */
Route::get('seguimiento', 'OrdenesmtlasignarController@seguimiento')->name('seguimiento')->middleware('superConsultor');
Route::get('seguimiento/{id}', 'OrdenesmtlasignarController@fotos')->name('fotos')->middleware('superConsultor');
Route::get('seguimientodetalle/{id}', 'OrdenesmtlasignarController@detalle')->name('detalle_de_orden')->middleware('superConsultor');
Route::get('posicionamiento', 'OrdenesmtlasignarController@posicionamiento')->name('posicionamiento')->middleware('superConsultor');
//Route::get('seguimientoExportar', 'OrdenesmtlasignarController@exportarExcel')->name('exportarxlsx');


/* RUTAS DE MARCA */
Route::get('marca', 'MarcasController@index')->name('marca')->middleware('superConsultor');
Route::get('marca/crear', 'MarcasController@crear')->name('crear_marca')->middleware('superEditor');
Route::post('marca', 'MarcasController@guardar')->name('guardar_marca')->middleware('superEditor');
Route::get('marca/{id}/editar', 'MarcasController@editar')->name('editar_marca')->middleware('superEditor');
Route::put('marca/{id}', 'MarcasController@actualizar')->name('actualizar_marca')->middleware('superEditor');
    
   
});

Route::group(['middleware' => ['auth','superEditor']], function () {

/* ORDENES CRITICA */
Route::get('critica', 'OrdenesmtlasignarController@critica')->name('critica');
Route::get('criticaadd', 'OrdenesmtlasignarController@criticaadd')->name('criticaadd');
Route::get('generar_critica', 'OrdenesmtlasignarController@generarcritica')->name('generar_critica');
Route::post('adicionar_critica', 'OrdenesmtlasignarController@adicionarcritica')->name('adicionar_critica');
Route::post('eliminar_critica', 'OrdenesmtlasignarController@eliminarcritica')->name('eliminar_critica');
});





