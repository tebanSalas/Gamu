<?php

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use gamu\Http\Requests;
use gamu\Instrumento;
use gamu\Prestamo;
use gamu\Estudiante;

class Instrumentos extends Controller
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

        $instrumentos = DB::select('select * from instrumentos WHERE instrumentos.delete = 0');
        return view('Instrumentos.index')->with(['instrumentos'=>$instrumentos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Instrumentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {               
        $itmt = new Instrumento();
        $itmt->nombre = $request->nombre;
        $itmt->serie = $request->serie;
        $itmt->marca = $request->marca;
        $itmt->disponibilidad = $request->disponibilidad;
        $itmt->estado = $request->estado;
        $itmt->num_activo = $request->num_activo;
        $itmt->delete = 0; //el cero significa que no está borrado
        
        if($itmt->save()){
            return back()->with('msj','Excelente! El instrumento ha sido guardada con éxito.');
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
        $inst = Instrumento::find($id);
        $pdf = \PDF::loadView('instrumentos/infoInstrumento',['inst' => $inst],['fecha' => $fech_Actual]);
        return $pdf->stream('infoInstrumento.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instrumento = Instrumento::find($id);
        return view('Instrumentos.edit')->with(['instrumento'=>$instrumento]);
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
        $instrumento = Instrumento::find($id);                    
        $instrumento->fill($request->all());
       
        
        if($instrumento->update()){
            return redirect('/instrumentos')->with('msj','Excelente! Los datos han sido modificados con éxito.');
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
        
        $instrumento = Instrumento::find($id);                    
        $instrumento->delete =1;
       
        
        if($instrumento->update()){
            return redirect('/instrumentos')->with('msj','Excelente! Los datos se han borrado con éxito.');
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor revisa los datos');
        }
    }

    public function buscarNombre(Request $request)
    {
        $nombre = $request->nombre;
        $con = 'select * from instrumentos WHERE instrumentos.delete = 0 && instrumentos.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $instrumentos = DB::select($consulta);
        return view('Instrumentos.index')->with(['instrumentos'=>$instrumentos]);

        
    }

    public function asignar()
    {
      $estud = DB::select('select * from estudiantes WHERE estudiantes.delete = 0');  
      $inst = DB::select('select * from instrumentos WHERE instrumentos.delete = 0 && instrumentos.disponibilidad like "Disponible"');
        return view('instrumentos.asignarInst')->with(['inst'=>$inst , 'estud'=>$estud]);  
      
    }

    public function buscar($nombre)
    {
        
        $con = 'select * from instrumentos WHERE instrumentos.delete = 0 && instrumentos.disponibilidad like "Disponible" && instrumentos.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $instrumentos = DB::select($consulta);

        
            return response()->json(
                $instrumentos
            );
        
    }

    public function prestamo(Request $request){
        $estud = Estudiante::find($request->estudiantes);
        $instru = Instrumento::find($request->instrumentos);

        $prestamo = new Prestamo();
        $prestamo->id_estudiante = $estud->id;
        $prestamo->id_instrumento =$instru->id;

        $mj = 'Se asignó a ' . $estud->nombre . ' '. $estud->apellidos . ' el instrumento ' . $instru->nombre . '.';

        if($prestamo->save()){
            return redirect('/home')->with('msj', $mj );
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor revisa los datos');
        }
        
    }

    public function reportesIntrumentos(){
        return view('instrumentos.seleccionReporte');
    }
}
