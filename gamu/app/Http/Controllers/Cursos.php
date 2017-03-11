<?php

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use gamu\Http\Requests;
use gamu\Curso;

class Cursos extends Controller
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
        $cursos = Curso::where('delete','=',0)->paginate(15);       
        //$cursos = DB::select('select * from cursos WHERE cursos.delete = 0');
        return view('cursos.index')->with(['cursos'=>$cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso();         
        $curso->nombre = $request->nombre;
        $curso->sigla = $request->sigla;
        $curso->tipo = $request->tipo;
        $curso->delete = 0; //el cero significa que esta visible
        
        if($curso->save()){
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
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $curso = Curso::find($id);
        $pdf = \PDF::loadView('cursos/infoCurso',['curso' => $curso],['fecha' => $fech_Actual]);
        return $pdf->stream('infoCurso.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        return view('cursos.edit')->with(['curso'=>$curso]);
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
        $curso = Curso::find($id);        
        $curso->fill($request->all());
       
        
        if($curso->update()){
            return redirect('/cursos')->with('msj','Excelente! Los datos han sido modificados con éxito.');
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
        $curso = Curso::find($id);        
        $curso->delete = 1;
       
        
        if($curso->update()){
            return redirect('/cursos')->with('msj','Excelente! Los datos han sido borrados con éxito.');
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor revisa los datos');
        }
    }
    public function listadoCursos()
    {
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $cursos = Curso::all();
        $pdf = \PDF::loadView('cursos/listadoCursos',['cursos' => $cursos],['fecha' => $fech_Actual]);
        return $pdf->stream('cursos.pdf');
    }

    public function buscarNombre(Request $request)
    {
        $nombre = $request->nombre;
        $con = 'select * from cursos WHERE cursos.delete = 0 && cursos.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $cursos = DB::select($consulta);
        return view('cursos.index')->with(['cursos'=>$cursos]);
        
    }

}