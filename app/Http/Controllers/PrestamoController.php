<?php

namespace App\Http\Controllers;

use App\Models\Admin\Cliente;
use App\Models\Admin\Prestamo;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');
        
        $clientes = Cliente::where('usuario_id', '=', $usuario_id )->get();
                            
        $usuarios = Usuario::orderBy('id')->where('id', '=', $usuario_id)->pluck('usuario', 'id')->toArray();

     
        if($request->ajax()){

            $datas = DB::table('prestamo')->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
            ->where('prestamo.usuario_id', '=', $usuario_id)->get();
            return  DataTables()->of($datas)
            // ->addColumn('editar', '<a href="{{url("cliente/$id/editar")}}" class="btn-accion-tabla tooltipsC" title="Editar este cliente">
            //       <i class="fa fa-fw fa-pencil-alt"></i>
            //     </a>')
            ->addColumn('action', function($datas){
          $button = '<button type="button" name="edit" id="'.$datas->id.'"
          class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar Prestamo"><i class="far fa-edit"></i></button>';
          $button .='&nbsp;<button type="button" name="prestamo" id="'.$datas->id.'"
          class = "prestamo btn-float  bg-gradient-warning btn-sm tooltipsC" title="Agregar Pago"><i class="fa fa-fw fa-plus-circle"></i><i class="fas fa-money-bill-alt"></i></button>';
          $button .='&nbsp;<button type="button" name="detalle" id="'.$datas->id.'"
          class = "detalle btn-float  bg-gradient-success btn-sm tooltipsC" title="Detalle de Pagos"><i class="fas fa-atlas"></i></i></button>';
          return $button;

            }) 
            ->rawColumns(['action'])
            ->make(true);
            }
        return view('admin.prestamo.index', compact('usuarios', 'datas','clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $rules = array(
            'monto'  => 'required',
            'tipo_pago'  => 'required',
            'cuotas' => 'required',
            'interes' => 'required',
            'valor_cuota' => 'required',
            'fecha_inicial' => 'required',
            'fecha_final' => 'required',
            'usuario_id' => 'required',
            'activo' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        Prestamo::create($request->all());
            return response()->json(['success' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalle($id)
    {
        
        if(request()->ajax()){

        $data = DB::table('prestamo')->Join('cliente', 'prestamo.cliente_id', '=', 'cliente.id')
            ->where('prestamo.cliente_id', '=', $id)->get();

        // $data = Prestamo::with('Cliente:nombres')->where('cliente_id', $id)->first();
            return response()->json(['result'=>$data]);

        }
        



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
