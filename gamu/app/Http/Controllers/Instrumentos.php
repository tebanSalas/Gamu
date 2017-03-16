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

        DB::beginTransaction();

        $instru->disponibilidad = "Ocupado";
        if($instru->update()){
            $prestamo = new Prestamo();
            $prestamo->id_estudiante = $estud->id;
            $prestamo->id_instrumento =$instru->id;

            $mj = 'Se asignó a ' . $estud->nombre . ' '. $estud->apellidos . ' el instrumento ' . $instru->nombre . '.';

            if($prestamo->save()){
                DB::commit();
                return redirect('/home')->with('msj', $mj );
            }else{
                DB::rollback();
                return back()->with('msj2', 'Opa!, No se puede concluir el prestamo, por favor intente más tarde');
            }
        }else{
            DB::rollback();
            return back()->with('msj2', 'Opa!, Estamos presentando dificultades para poner el instrumento como ocupado.');
        }

        
        
    }
    //*****************************DEVOLUCION******************************

    public function devolucion()
    {
        $estud = DB::select('select * from estudiantes WHERE estudiantes.delete = 0');
        return view('instrumentos.devolucion')->with(['estud'=>$estud]);
    }
    public function getPrestamo($id)
    {
        $query="select i.nombre as nombre, i.serie AS serie, i.marca AS marca, i.id AS id , p.id AS idPrestamo
                FROM prestamos as p 
                JOIN instrumentos AS i ON (p.id_estudiante=$id AND i.id =p.id_instrumento)";

        $prestamo = DB::select($query);
        return response()->json(
                $prestamo
            );
    }
    public function getInstrumento($id)
    {
        $query="select i.nombre as nombre, i.serie AS serie, i.marca AS marca, i.id AS id , p.id AS idPrestamo
                FROM instrumentos as i
                JOIN prestamos as p ON (i.id =p.id_instrumento and p.id_instrumento =$id)";

        $prestamo = DB::select($query);
        return response()->json(
                $prestamo
            );
    }
    public function desvincular(Request $request)
    {   
        
        $id = $request->idPrestamo;
        $idInst = $request->instrumentos;
        $instrumento =  Instrumento::find($idInst);
        $instrumento->disponibilidad = "Disponible";
        DB::beginTransaction();
        if($instrumento->update()){
            $prestamo = Prestamo::find($id);
            if($prestamo->delete($id)){
                DB::commit();
                return back()->with('msj','Excelente! El instrumento ahora está disponible');
            }else{
                 DB::rollback();
                return back()->with('msj2', 'Opa!, algo pasó. No ha sido posible tramitar la devolución. Por favor intente más tarde');
            }
        }else{
             DB::rollback();
             return back()->with('msj2', 'Opa!, algo pasó. No se ha podido actualizar la información del instrumento, por lo que la devolución no se puede tramitar en este momento');
        }
    }

    //***************************** REPORTES *****************************
    public function inventarioPDF()
    {
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $instrumentos = DB::select('select * from instrumentos WHERE instrumentos.delete = 0');
        $pdf = \PDF::loadView('instrumentos/reportes/inventario',['instrumentos' => $instrumentos],['fecha' => $fech_Actual]);
        return $pdf->stream('InventarioInstrumentos.pdf');
    }
    public function instruDisponiblesPDF()
    {
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $instrumentos = DB::select('select * from instrumentos WHERE instrumentos.delete = 0 and instrumentos.disponibilidad = "Disponible"');
        $pdf = \PDF::loadView('instrumentos/reportes/inventario',['instrumentos' => $instrumentos],['fecha' => $fech_Actual]);
        return $pdf->stream('InstrumentosDisponibles.pdf');
    }
    public function instrumentosOcupadosPDF()
    {
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $query = "select i.nombre as inombre, i.serie AS iserie, i.marca AS imarca, e.nombre AS enombre, e.apellidos AS eapellidos, e.cedula AS eced 
            FROM prestamos as p
            JOIN  instrumentos as i ON (i.id =p.id_instrumento)
            JOIN estudiantes as e ON (p.id_estudiante = e.id)";
        $instrumentos = DB::select($query);
        $pdf = \PDF::loadView('instrumentos/reportes/instrumentosOcupados',['instrumentos' => $instrumentos],['fecha' => $fech_Actual]);
        return $pdf->stream('InstrumentosOcupadosyQuienLoTiene.pdf');
    }
    public function reportesIntrumentos(){
        return view('instrumentos.seleccionReporte');
    }
}
