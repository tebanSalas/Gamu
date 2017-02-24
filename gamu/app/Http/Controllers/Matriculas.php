<?php

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use gamu\Http\Requests;
use gamu\Estudiante;
use gamu\matricula;

class Matriculas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estud = DB::select('select * from estudiantes WHERE estudiantes.delete = 0');
        return view('matricula.index')->with(['estud'=>$estud]);
        //return view('matricula.index');
    }
    
    public function buscarEstudiante($nombre)
    {
        
        $con = 'select * from estudiantes WHERE estudiantes.delete = 0 && estudiantes.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $estudiantes = DB::select($consulta);
            return response()->json(
                $estudiantes
            );
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = DB::select('select * from estudiantes WHERE estudiantes.delete = 0');
            return response()->json(
                $estudiantes
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->idEstud;
        $recibo = $request->comprobante;
        $estud = Estudiante::find($id);

        $id_ciclo = DB::select("select id from ciclos WHERE ciclos.habilitado = 1");
        $cursos = DB::select("select * from cur_profs where cur_profs.id_ciclo='$id_ciclo'");
        $query =  DB::select("select * from matriculas,facturas where (matriculas.recibo_banco='$recibo' or facturas.recibo_banco='$recibo' )");
        if(empty($query)){
            return back()->with('msj', 'Exitoso');
        }
        else{
            return back()->with('msj2', 'Opa!, Este recibo ya ha sido registrado en el sistema');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

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
