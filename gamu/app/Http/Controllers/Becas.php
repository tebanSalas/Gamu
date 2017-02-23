<?php   

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use gamu\Http\Requests;
use gamu\Beca;
use gamu\Estudiante;

class Becas extends Controller
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
        $becas = DB::select('select * from becas WHERE becas.delete = 0');
        return view('becas.index')->with(['becas'=>$becas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('becas.createBeca');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $beca = new Beca();
        $beca->nombre = $request->nombre;
        $beca->descuento = $request->descuento;
        $beca->detalle = $request->detalle;
        $beca->delete = 0; //si el delete está en cero quiere decir que no está borrado, si está en 1 que ya se borró
        
        if($beca->save()){
            return back()->with('msj','Excelente! La beca ha sido guardada con éxito.');
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
        $beca = Beca::find($id);
        $pdf = \PDF::loadView('becas/infoBeca',['beca' => $beca],['fecha' => $fech_Actual]);
        return $pdf->stream('infoBeca.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beca = Beca::find($id);
        return view('becas.edit')->with(['beca'=>$beca]);
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

        $beca = Beca::find($id);      
        $beca->fill($request->all());
                
        if($beca->update()){
            return redirect('/becas')->with('msj','Excelente! Los datos han sido modificados con éxito.');
            
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

        $beca = Beca::find($id);
        $beca->delete = 1;
        if($beca->update()){
            return redirect('/becas')->with('msj','Los datos de la beca han sido borrados de manera permanente');
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor revisa los datos');
        }       
    }
    public function listadoBecas()
    {
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $becas = Beca::all();
        $pdf = \PDF::loadView('becas/listadoBecas',['becas' => $becas],['fecha' => $fech_Actual]);
        return $pdf->stream('becas.pdf'); 
    }

    public function buscarNombre(Request $request)
    {
        $nombre = $request->nombre;
        $con = 'select * from becas WHERE becas.delete = 0 && becas.nombre like "%';
        $sulta = $nombre.'%"';
        $consulta = $con . $sulta;
        $becas = DB::select($consulta);
        return view('becas.index')->with(['becas'=>$becas]);
    }

    public function asignar()
    {
      $becas = DB::select('select * from becas WHERE becas.delete = 0');
      $estud = DB::select('select * from estudiantes WHERE estudiantes.delete = 0');
      return view('becas.asignarBeca')->with(['becas'=>$becas, 'estud'=>$estud]);  
      
    } 

    public function asignarBeca(Request $request){
        $estud = Estudiante::find($request->estudiantes);
        $beca = Beca::find($request->becas);

        $estud->id_beca = $request->becas;
        $msj = 'Se asignó a ' . $estud->nombre . ' '. $estud->apellidos . ' la beca llamada ' . $beca->nombre . '.';
        if($estud->update()){
            return redirect('/home')->with('msj', $msj );
        }else{
            return back()->with('msj2', 'Opa!, algo pasó. Por favor revisa los datos');
        }
        
    }
} 
