<?php

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use gamu\Http\Requests;
use gamu\Estudiante;
use gamu\matricula;
use gamu\Ciclo;
use gamu\Curso;
use gamu\Profesor;

class Matriculas extends Controller
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

        //información, y validación delrecibo
        $recibo = $request->comprobante; //numero de recibo
        $query =  DB::select("select * from matriculas,facturas where (matriculas.recibo_banco='$recibo' or facturas.recibo_banco='$recibo' )"); //consulta que me dicesi el recibo existe
        //validación
        if(empty($query)){
            //si el recibo eciste traigo los datos que ocupo 
            //información del estudiante
                $id = $request->idEstud; 
                $estud = Estudiante::find($id);
            //Obtención del ciclo 
                $idciclo = DB::select("select id from ciclos WHERE ciclos.habilitado = 1");
                $id_ciclo = 0;
                foreach ($idciclo as $cic) {
                    $id_ciclo = $cic->id;
                }
                $ciclo = Ciclo::find($id_ciclo);

            //obtengo los id de cursos y los profes y del ciclo lectivo activo
                $curProfs = DB::select("select * from cur_profs where cur_profs.id_ciclo ='$id_ciclo'");
                //todos los cursos
                $cursos = DB::select('select * from cursos WHERE cursos.delete = 0');
        //todos los profesores     
                $profes = DB::select('select * from profesors WHERE profesors.delete = 0');
            
           return view('matricula.matricular')->with(['estudiantes'=>$estud,
                                                        'ciclo'=>$ciclo,
                                                        'curProfs'=>$curProfs]);
        }
        else{
            return back()->with('msj2', 'Opa!, Este recibo ya ha sido registrado en el sistema');
        }        
    }

    public function cursosProfes($idCurso)
    {
        //todos los cursos
                $cursos = DB::select('select * from cursos WHERE cursos.delete = 0');
        //todos los profesores     
                $profes = DB::select('select * from profesors WHERE profesors.delete = 0');

        return response()->json(
            $cursos, $profes
        );        
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
