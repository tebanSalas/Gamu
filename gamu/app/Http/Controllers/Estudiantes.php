<?php

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use gamu\Http\Requests;
use gamu\Estudiante;
use gamu\Beca;

class Estudiantes extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $estudiantes = Estudiante::SELECT ('*')->FROM ('estudiantes')-> WHERE ('estudiantes.delete','=','0')->get();
        return view('estudiantes.index')->with(['estud'=>$estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $becas = Beca::all();
        return view('estudiantes.create')->with(['becas'=>$becas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante = new Estudiante();                 
        $estudiante->cedula = $request->cedula;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->telefono = $request->telefono;
        $estudiante->email = $request->email;
        $estudiante->sede = $request->sede;

        $estudiante->nombre_padre1 = $request->nombre_padre1;
        $estudiante->tel_padre1 = $request->tel_padre1;
        $estudiante->nombre_padre2 = $request->nombre_padre2;
        $estudiante->tel_padre2 = $request->tel_padre2;
        $estudiante->email_emergencia = $request->email_emergencia;

        $estudiante->id_beca = $request->id_beca;

         $estudiante->delete = 0; //el cero significa que no esta borrado, el 1 que si 
        
        if($estudiante->save()){
            return back()->with('msj','Excelente! El estudiante ha sido guardado con éxito.');
        }else{
            return back()->with('msj2', "Opa!, algo pasó. Por favor revisa los datos.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $estud = Estudiante::find($id);
        $pdf = \PDF::loadView('estudiantes/infoEstudiante',['estu' => $estud],['fecha' => $fech_Actual]);
        return $pdf->stream('infoEstudiante.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estud = Estudiante::find($id);
        $becas = Beca::all();
        return view('estudiantes.edit')->with(['estud'=>$estud ,'becas'=>$becas]);
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
        $estudiante = Estudiante::find($id);
        $estudiante->fill($request->all());
        if($estudiante->update()){
            return redirect('/estudiantes')->with('msj','Excelente! Los datos han sido modificados con éxito.');
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor revisa los datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete = 1;
             
        if($estudiante->update()){
            return redirect('/estudiantes')->with('msj','Excelente! Los datos han sido eliminados');
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor revisa los datos');
        }
        
    } 

    public function buscarNombre(Request $request)
    {
        $nombre = $request->nombre;
        $con = 'select * from estudiantes WHERE estudiantes.delete = 0 && estudiantes.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $estudiantes = DB::select($consulta);
        return view('estudiantes.index')->with(['estud'=>$estudiantes]);
    }

    public function buscar($nombre)
    {
        
        $con = 'select * from estudiantes WHERE estudiantes.delete = 0 && estudiantes.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $estudiantes = DB::select($consulta);
            return response()->json(
                $estudiantes
            );
        
    }

    //**************************** ACTIVACION DE ESTUDIANTES ************************************
   public function indexInactivos()
    {
        return view('estudiantes.activacion.estudiantesInactivos') ;  
    }
    public function estudiantesInactivos()
    {
        $estudiantes = DB::select('select * from estudiantes WHERE estudiantes.delete = 1');
            return response()->json(
                $estudiantes
            );   
    }

    public function activarEstudiante(Request $request)
    {
        
        $estudiante = Estudiante::find($request->id);
        $estudiante->delete = 0;
      
        
        if($estudiante->update()){
            return redirect('/estudiantes')->with('msj','Excelente! El estudiante ha sido habilitado de nuevo');
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor revisa los datos');
        }
        
    }
    public function buscarInactivo($nombre)
    {
        
        $con = 'select * from estudiantes WHERE estudiantes.delete = 1 && estudiantes.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $estudiantes = DB::select($consulta);
            return response()->json(
                $estudiantes
            );
        
    }
    //*************************REPORTE************************************
    public function listadoEstudiantes()
    {
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $estudiantes = Estudiante::all();
        $pdf = \PDF::loadView('estudiantes/listadoEstudiantes',['estud' => $estudiantes],['fecha' => $fech_Actual]);
        return $pdf->stream('ListaEstudiantesActivos.pdf');
    }
 
} 
