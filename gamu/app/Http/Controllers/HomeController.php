<?php

namespace gamu\Http\Controllers;

use Illuminate\Http\Request;
use gamu\Ciclo;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idciclo = DB::select("select id from ciclos WHERE ciclos.habilitado = 1");
        $id_ciclo = 0;
        foreach ($idciclo as $cic) {
            $id_ciclo = $cic->id;
        }
        $ciclo = Ciclo::find($id_ciclo);
        $fech_Actual = "Fecha:  " . date("d") . " del " . date("m") . " de " . date("Y");
        return view('home')->with(['ciclo'=>$ciclo, 'fecha'=>$fech_Actual]);
    }
}
