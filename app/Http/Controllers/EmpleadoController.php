<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionEmpleado;
use App\Models\Admin\Empleado;
use App\Models\Admin\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       
        $rol_id = $request->session()->get('rol_id');

        if($rol_id == 1){

            $empleado_id = $request->session()->get('empleado_id');
        
            $empresa = Empresa::orderBy('id')->pluck('id','nombre')->toArray();
   
           
            if($request->ajax()){
    
                                 
                $datas = Empleado::orderBy('id')->get();
                return  DataTables()->of($datas)
                ->addColumn('editar', '<a href="{{url("empleado/$id/editar")}}" class="btn-accion-tabla tooltipsC" title="Editar este empleado">
                      <i class="fa fa-fw fa-pencil-alt"></i>
                    </a>')
            //     ->addColumn('editar', function($datas){
            //   $button = '<button type="button" name="edit" id="'.$datas->id.'"
            //   class"edit btn btn-primary btn-sm">Editar</button>';
            //   return $button;
    
            //     }) 
                ->rawColumns(['editar'])
                ->make(true);
                    
                }
            
            return view('admin.empleado.index', compact('empresa'));

        }else{
        
        $empleado_id = $request->session()->get('empleado_id');
        
        $empresa = DB::table('empleado')->Join('empresa', 'empleado.empresa_id', '=', 'empresa.id')
        ->where('empleado.id', '=', $empleado_id)->pluck('empresa.id', 'empresa.nombre')->toArray();

        $empresaLogin = DB::table('empleado')->Join('empresa', 'empleado.empresa_id', '=', 'empresa.id')
        ->where('empleado.id', '=', $empleado_id)->select('empleado.empresa_id')->get();

       
        if($request->ajax()){

            foreach ($empresaLogin as $empresa) {
                             
            $datas = Empleado::where('empresa_id', '=', $empresa->empresa_id)->orderBy('id')->get();
            return  DataTables()->of($datas)
            ->addColumn('editar', '<a href="{{url("empleado/$id/editar")}}" class="btn-accion-tabla tooltipsC" title="Editar este empleado">
                  <i class="fa fa-fw fa-pencil-alt"></i>
                </a>')
        //     ->addColumn('editar', function($datas){
        //   $button = '<button type="button" name="edit" id="'.$datas->id.'"
        //   class"edit btn btn-primary btn-sm">Editar</button>';
        //   return $button;

        //     }) 
            ->rawColumns(['editar'])
            ->make(true);
                }
            }
        
        return view('admin.empleado.index', compact('empresa'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $rules = array(
            'nombres'  => 'required|max:100',
            'apellidos'  => 'required|max:100',
            'documento' => 'numeric|required|min:10000|max:9999999999',
            'tipo_documento' => 'required',
            'empresa_id' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'barrio' => 'required',
            'direccion' => 'required',
            'activo' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        
        Empleado::create($request->all());
            return response()->json(['success' => 'ok']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    { 

            $empresa = Empresa::orderBy('id')->pluck('id','nombre');
            $data = Empleado::findOrFail($id);
        
      
        return view('admin.empleado.editar', compact('data','empresa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionEmpleado $request, $id)
    {
        $usuario = Empleado::findOrFail($id);
        $usuario->update($request->all());
        return redirect('empleado')->with('mensaje', 'Empresa actualizada con exito!!');
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
