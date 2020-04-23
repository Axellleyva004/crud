<?php

namespace App\Http\Controllers;

use App\Casillas;
use Illuminate\Http\Request;

class CasillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosCasilla['casillas']=Casillas::paginate(5);
        return view('casillas.index',$datosCasilla);
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
        return view('casillas.create');

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
            'ubicacion'=>'required|string|max:50',
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosCasilla=request()->except('_token');
        Casillas::insert($datosCasilla);
        //return response()->json($datosCandidato);
        return redirect('casillas')->with('Mensaje','Casilla agregada con exito');
    }

    
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
        $casilla=Casillas::findOrFail($id);
        return view('casillas.edit',compact('casilla'));
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
            'ubicacion'=>'required|string|max:50'
        ];
       
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosCasilla=request()->except(['_token','_method']);
        Casillas::where('id','=',$id)->update($datosCasilla);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('casillas')->with('Mensaje','Casilla modificado con exito');
    }

    
    public function destroy($id)
    {
        $casilla=Casillas::findOrFail($id);
        
        Casillas::destroy($id);
        
        return redirect('casillas')->with('Mensaje','Casilla eliminada con exito');
    }
}
