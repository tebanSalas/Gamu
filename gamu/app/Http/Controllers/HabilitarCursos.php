<?php

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use gamu\Http\Requests;
use gamu\Curso;
use gamu\Profesor;
use gamu\Ciclo;
use gamu\CurProf;

class HabilitarCursos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profes = DB::select('select * from profesors WHERE profesors.delete = 0');
        $curso = DB::select('select * from cursos WHERE cursos.delete = 0');
        $ciclo = DB::select('select * from ciclos WHERE ciclos.habilitado = 1');
        return view('cursos.habilitar')->with(['profes'=>$profes, 'curso'=>$curso, 'ciclo'=>$ciclo]);
    }

    public function buscarCurso($nombre)
    {
        $con = 'select * from cursos WHERE cursos.delete = 0 && cursos.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $cursos = DB::select($consulta);

        
            return response()->json(
                $cursos
            );
        
    }
    public function buscarProfe($nombre)
    {
        $con = 'select * from profesors WHERE profesors.delete = 0 && profesors.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $profes = DB::select($consulta);

        
            return response()->json(
                $profes
            );
        
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
    public function store(Request $request)
    {
        $curProf =  new CurProf();
        $curProf->id_curso = $request->cursos;
        $curProf->id_prof= $request->profesores;
        $curProf->horario= $request->horario;
        $curProf->id_ciclo= $request->ciclo;

        if($curProf->save()){
            return back()->with('msj','Excelente! El curso se guardo con éxito.');
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
        //
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
