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
use gamu\CurProf;
use gamu\Factura;
 
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
        return view('matricula.index');
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

    //aca lo que hago es validar si la petición es de tipo ajax, luego obtengo los valores del idestudiante, del idcurprof, del numero recibo, y validar que la matricula no exista, osea que el estudiante no se haya matriculado ya en se curso. si la matricula no existe, procedemos a crearla, para esto primero abrimos una transacción creamos una factura para todo el proceso de matricula de un estudiante. (esto quiere decir que si matriculo en 5 cursos todos van a llevar el mismo id de la factura). si la factura no existe la creo y la asigno a una matricula, si la factura ya existe solamente asigno la factura a la matricula.
         
        if($request->ajax()){
            $id_estu = $request->estudiante;
            $curProf = $request->curProf;
            $factura = $request->factura;
            $query = DB::select("select * from matriculas WHERE (matriculas.id_estudiante=$id_estu and matriculas.id_curProf=$curProf)");
            
            if(empty($query)){

            DB::beginTransaction();

                $mismoRecibo = DB::select("select * from facturas WHERE facturas.recibo_banco = $factura");
                $idFactura =0;
                if(empty($mismoRecibo)){
                    $recibo = new Factura();
                    $recibo->id_estudiante = $id_estu;
                    $recibo->fecha_pago = date("Y-m-d");
                    $recibo->recibo_banco = $request->factura;
                    $recibo->mes_cobro = 'matricula';
                    if($recibo->save()==false){
                        DB::rollback();
                    }
                }//empty mismo recibo

                $queryFactura = DB::select("select id from facturas WHERE facturas.recibo_banco =$factura");
                foreach ($queryFactura as $fac) {
                    $idFactura = $fac->id;
                }
                $matri = new matricula();
                $matri->id_estudiante = $request->estudiante;
                $matri->id_ciclo = $request->ciclo;
                $matri->id_curProf = $request->curProf;
                $matri->nota = 0;
                $matri->recibo_banco = $idFactura;
                
                if($matri->save()){
                    $cursoprofe = CurProf::find($curProf);
                    $cursoprofe->cupo = $cursoprofe->cupo - 1;
                    if($cursoprofe->cupo>0){
                        if($cursoprofe->update()){
                            DB::commit();
                            return response()->json([
                                "mjs"=> "Matriculado"
                            ]);
                        }else{
                            DB::rollback();
                        }
                    }//$cursoprofe>0
                      
                }else{
                    DB::rollback();
                }  

            }//empty query
        }//ajax               
    }//class

    public function getHorario($id_curProf)
    {
        
        $cursoHablitado = CurProf::find($id_curProf);
        return response()->json([
            $cursoHablitado
            ]);        
    }

    public function validarRecibo(Request $request)
    {
    //información, y validación delrecibo
        $recibo = $request->comprobante; //numero de recibo
        $query =  DB::select("select * from facturas where facturas.recibo_banco='$recibo'"); //consulta que me dicesi el recibo existe
        //validación
        
        if(empty($query) && $recibo!=""){
            //si el recibo existe traigo los datos que ocupo 
             //información del estudiante
                $id = $request->idEstud; 
                $estud = Estudiante::find($id);
    ///Obtención del ciclo 
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
                                                            'curProfs'=>$curProfs,
                                                            'cursos'=>$cursos,
                                                            'profes'=>$profes,
                                                            'recibo'=>$recibo,]);
        }
        else{
            return back()->with('msj2', 'Opa!, El número de recibo ya ha sido registrado en el sistema, o no se ha proporcionado ningún número.');
        } 
    }

    public function talleres()
    {
      
        $estud = DB::select('select * from estudiantes WHERE estudiantes.delete = 0');
    ///Obtención del ciclo 
        $idciclo = DB::select("select id from ciclos WHERE ciclos.habilitado = 1");
        $id_ciclo = 0;
        foreach ($idciclo as $cic) {
            $id_ciclo = $cic->id;
        }
        $ciclo = Ciclo::find($id_ciclo);
        //obtengo los id de cursos y los profes y del ciclo lectivo activo
        $curProfs = DB::select("select * from cur_profs where cur_profs.id_ciclo ='$id_ciclo'");
        //todos los cursos
        $cursos = DB::select('select * from cursos WHERE cursos.delete = 0 ');
        //todos los profesores     
        $profes = DB::select('select * from profesors WHERE profesors.delete = 0');

        return view('matricula.talleres')->with(['estud'=>$estud,
                                                    'ciclo'=>$ciclo,
                                                    'curProfs'=>$curProfs,
                                                    'cursos'=>$cursos,
                                                    'profes'=>$profes]);         
    }



//*******************REGISTRO DE NOTAS*********************

    public function buscaRegistar()
    {
        return view('matricula.buscaRegistar');
    }

    public function registarNotas($idEstud)
    {
        //get Estudiante
        $estudiante = Estudiante::find($idEstud);

        //get ciclo
        $idciclo = DB::select("select id from ciclos WHERE ciclos.habilitado = 1");
        $id_ciclo = 0;
        foreach ($idciclo as $cic) {
            $id_ciclo = $cic->id;
        }
        $ciclo = Ciclo::find($id_ciclo);

        //get matriculas
        $matriculas = DB::select("select * from matriculas WHERE matriculas.id_estudiante = $idEstud and matriculas.nota = 0");
        //get Cursos
        $query="select c.nombre AS nameCurso, p.nombre AS nameProf, p.apellidos AS apellidosProf, cp.id FROM cursos as c JOIN cur_profs AS cp ON (cp.id_curso=c.id) JOIN profesors AS p ON(cp.id_prof=p.id AND cp.id_ciclo=$id_ciclo)";
        $cursos = DB::select($query);
        return view('matricula.registarNotas')->with(['estudiantes'=>$estudiante,
                                                    'ciclo'=>$ciclo,
                                                    'cursos'=>$cursos,
                                                    'matriculas'=>$matriculas]);
    }

    public function asignarNota(Request $request)
    {
        $idMatri = $request->idMatricula;
        $nota = $request->nota;

        $matri = matricula::find($idMatri);
        $matri->nota =  $nota;

        if($matri->update()){
            return back()->with('msj','Excelente! La nota ha sido modificada');
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor reintente más tarde');
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
