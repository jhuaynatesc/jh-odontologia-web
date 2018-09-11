<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
function convertString ($date)
{
    // convert date and time to seconds
    $sec = strtotime($date);

    // convert seconds into a specific format
    $date = date("Y-m-d H:i", $sec);

    // append seconds to the date and time
    $date = $date . ":00";

    // print final date and time
    return $date;
}
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('cliente.cita.create');
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
        if (!$request->ajax()) return redirect('/');
        $cita=new Cita();
        $cita->titulo="Cita";
        $cita->fechaInicio=convertString($request->starts);
        $cita->fechaFin=convertString($request->ends);
        $cita->color="#fbc02d";
        $cita->idPaciente=$request->id;
        $cita->observacion=$request->title==""?"Ninguna":$request->title;
        $cita->estado="pendiente";
        $cita->save();
        return json_encode($cita);
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
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $cita = Cita::findOrFail($request->id);
        $cita->titulo="Cita";
        $cita->fechaInicio=convertString($request->starts);
        $cita->fechaFin=convertString($request->ends);
        $cita->color="#fbc02d";
        $cita->observacion=$request->title==""?"Ninguna":$request->title;
        $cita->estado="pendiente";
        $cita->save();
        return json_encode($cita);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function citaCliente(Request $request){

        if (!$request->ajax()) return redirect('/');
        $cita=Cita::get()->where('idPaciente',$request->id);
        return json_encode($cita);
        
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $cita = Cita::findOrFail($request->id);
        $cita->estado = 'Anulado';
        $cita->color = '#b71c1c';
        $cita->save();
        return json_encode($cita);
    }
    public function misCitas(){
        return  view('cliente.cita.miscitas');
    }
}
