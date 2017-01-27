<?php

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use gamu\Http\Requests;
use gamu\Profesor;


class Profesors extends Controller
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
        $profesores = DB::select('select * from profesors WHERE profesors.delete = 0');
        return view('profesores.index')->with(['profes'=>$profesores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profe = new Profesor();
        $profe->cedula = $request->cedula;
        $profe->nombre = $request->nombre;
        $profe->apellidos = $request->apellidos;
        $profe->fecha_nacimiento = $request->fecha_nacimiento;
        $profe->telefono = $request->telefono;
        $profe->email = $request->email;
        $profe->especialidad = $request->especialidad;
        $profe->sueldo = $request->sueldo;
        $profe->delete = 0; //el cero significa que esta visible
        
        if($profe->save()){
            return back()->with('msj','Excelente! El profesor ha sido guardado con éxito.');
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
        $prof = Profesor::find($id);
        $pdf = \PDF::loadView('profesores/infoProfe',['profe' => $prof],['fecha' => $fech_Actual]);
        return $pdf->stream('infoProfesor.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prof = Profesor::find($id);
        return view('profesores.edit')->with(['prof'=>$prof]);
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
        $profe = Profesor::find($id);
        $profe->fill($request->all());
      
        
        if($profe->update()){
            return redirect('/profesores')->with('msj','Excelente! Los datos han sido modificados con éxito.');
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
        $profe = Profesor::find($id);
        $profe->delete = 1;
      
        
        if($profe->update()){
            return redirect('/profesores')->with('msj','Excelente! Los datos se han borrado con éxito.');
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor revisa los datos');
        }
    }

    public function listadoProfesores()
    {
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $profesores = Profesor::all();
        $pdf = \PDF::loadView('profesores/listadoProfesores',['profesores' => $profesores],['fecha' => $fech_Actual]);
        return $pdf->stream('profesores.pdf');
    }

    public function buscarNombre(Request $request)
    {
        $nombre = $request->nombre;
        $con = 'select * from profesors WHERE profesors.delete = 0 && profesors.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $profesores = DB::select($consulta);
        return view('profesores.index')->with(['profes'=>$profesores]);

    }
}
