<?php

namespace App\Http\Controllers;

use App\Votos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;


class VotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generatepdf()
    {
        $voto = Votos::all();
        //print_r($casillas);exit;
        $pdf = PDF::loadView('votos/index', ['votos' => $voto]);
        return $pdf->download('archivo.pdf');
    }
    public function index()
    {
        $datosVoto['votos']=Votos::all();
        return view('votos.index',$datosVoto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(/*Request $request*/)
    {
        /*$candidato=new Candidatos();
        $candidato->nombrecompleto=$request->nombrecompleto;
        $candidato->foto=$request->foto;
        $candidato->sexo=$request->sexo;
        $candidato->perfil=$request->perfil;
        $candidato->save();
        */
        return view('votos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$candidato=new Candidatos();
        $candidato->nombrecompleto=$request->nombrecompleto;
        $candidato->foto=$request->foto;
        $candidato->sexo=$request->sexo;
        $candidato->perfil=$request->perfil;
        $candidato->save();
        return view('candidatos.create');*/
        //$datosCandidato=request()->all();
        $campos=[
            'id_eleccion'=>'required',
            'id_casilla'=>'required',
            'evidencia'=>'required|max:10000|mimes:jpeg,png,jpg'
            
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosVoto=request()->except('_token');
        if($request->hasFile('evidencia')){
            $datosVoto['evidencia']=$request->file('evidencia')->store('uploads','public');

        }
        Votos::insert($datosVoto);
        //return response()->json($datosCandidato);
        return redirect('votos')->with('Mensaje','Voto agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voto=Votos::findOrFail($id);
        return view('votos.edit',compact('voto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'id_eleccion'=>'required',
            'id_casilla'=>'required',
            'evidencia'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
       
        if($request->hasFile('evidencia')){
            $campos+=['evidencia'=>'required|max:10000|mimes:jpeg,png,jpg'];
        }
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosVoto=request()->except(['_token','_method']);
        if($request->hasFile('evidencia')){
            $voto=Votos::findOrFail($id);
            Storage::delete('public/'.$voto->evidencia);
            $datosVoto['evidencia']=$request->file('evidencia')->store('uploads','public');

        }
        Votos::where('id','=',$id)->update($datosVoto);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('votos')->with('Mensaje','Voto modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voto=Votos::findOrFail($id);
        if(Storage::delete('public/'.$voto->evidencia))
        {
            Votos::destroy($id);
        }
        
        return redirect('votos')->with('Mensaje','Voto eliminado con exito');
    }
}
