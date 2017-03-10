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
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");

        $query = "select p.nombre AS pNombre, p.apellidos AS pApellidos, c.nombre AS cNombre, c.sigla AS cSigla, cp.horario, cp.cupo
            FROM cur_profs as cp
            JOIN  profesors as p ON (p.id =cp.id_prof)
            JOIN cursos as c ON (c.id = cp.id_curso)";
        $cursos = DB::select($query);

        $pdf = \PDF::loadView('cursos/guiaCursosHorariosPDF',['cursos' => $cursos],['fecha' => $fech_Actual]);
        return $pdf->stream('GuiaCusosHorarios.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prof= $request->profesores;
        $curso = $request->cursos;
        $query = DB::select("select * from cur_profs WHERE cur_profs.id_curso = $curso and cur_profs.id_prof = $prof");

        if(empty($query)){
            $curProf =  new CurProf();
            $curProf->id_curso = $request->cursos;
            $curProf->id_prof= $request->profesores;
            $curProf->horario= $request->horario;
            $curProf->id_ciclo= $request->ciclo;
            $curProf->cupo = $request->cupo;

            if($curProf->save()){
               return back()->with('msj','Excelente! El curso se guardo con éxito.');
            }else{
            return back()->with('msj2', "Opa!, algo pasó. Por favor revisa los datos.");
            }
        }else{
            return back()->with('msj2', "Opa!, El profesor ya fue asignado a impartir este curso, para el presente ciclo lectivo");
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
