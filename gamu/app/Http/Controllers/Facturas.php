<?php

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use gamu\Http\Requests;
use gamu\Ciclo;
use gamu\Factura;
use gamu\Estudiante;

class Facturas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estud = DB::select('select * from estudiantes WHERE estudiantes.delete = 0 ORDER BY estudiantes.nombre ASC');
        //$estud = Estudiante::where('delete','=',0)->get();
        return view('pagos.registarPago')->with(['estud'=>$estud]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $numRecibo =  $request->recibo;
        $mesPago = $request->mesPago;
        $idEstud = $request->idEstud;

        $idciclo = DB::select("select id from ciclos WHERE ciclos.habilitado = 1");
        $id_ciclo = 0;
        foreach ($idciclo as $cic) {
            $id_ciclo = $cic->id;
        }
        $ciclo = Ciclo::find($id_ciclo);
        $year = $ciclo->year;
        $actualYear = date("Y"); 

        $validaRecibo = DB::select("select * from facturas where facturas.recibo_banco='$numRecibo'");
        if(empty($validaRecibo)){
            $factura = new Factura();
            $factura->id_estudiante = $request->idEstud;
            $factura->fecha_pago = date("Y-m-d");
            $factura->recibo_banco = $numRecibo;
            $factura->mes_cobro = $mesPago;
            if($factura->save()){
                return $this->historicoPagos($request->idEstud);
                //return back()->with('msj','Excelente! El Pago se ha registrado con éxito.');
            }else{
                return back()->with('msj2', "Opa!, algo pasó. Por favor revisa los datos, o intenta mas tarde");
        }
        }else{
            return back()->with('msj2', "Opa!, Es posible que el número de recibo ya haya sido registrado, o que el mes que seleccionó ya se haya pagado ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //este metodo lo llamo desde  cargarFacturas.js, y me trae los meses del año que ya se han facuturado para luego yo mostrarlos en un text area
    public function show($id)
    {   
        $idciclo = Ciclo::where('habilitado','=',1)->get();
        $id_ciclo = 0;
        foreach ($idciclo as $cic) {
            $id_ciclo = $cic->id;
        }
        $ciclo = Ciclo::find($id_ciclo);
        $yearCiclo = $ciclo->year;
        $actualYear = date("Y"); 
        $queryMeses = DB::select("select facturas.mes_cobro, facturas.recibo_banco from facturas WHERE facturas.id_estudiante=$id and $yearCiclo=$actualYear" );
        return response()->json(
                $queryMeses
            );
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
//***************************************REPORTE******************************************
    public function historicoPagos($id)
    {
        $fech_Actual = "Informe emitido el: " . date("d") . " del " . date("m") . " de " . date("Y");
        $query = "select f.fecha_pago, f.recibo_banco, f.mes_cobro, e.nombre, e.apellidos, e.cedula
                   FROM facturas as f
                   JOIN estudiantes as e ON (f.id_estudiante = e.id and e.id=$id) ORDER BY fecha_pago DESC";
        $pago = DB::select($query);
        $pdf = \PDF::loadView('pagos/pagosEstudiante',['pago' => $pago],['fecha' => $fech_Actual]);
        return $pdf->stream('HistoricoDePagos.pdf');
    }

    public function buscaEstudianteHistorico()
    {
        return view('pagos.buscaEstudianteHistorico');
    }
}
