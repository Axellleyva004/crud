<?php

namespace App\Http\Controllers;

use App\Votocandidatos;
use Illuminate\Http\Request;

class VotocandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosVotocandidato['votocandidatos']=Votocandidatos::paginate(5);
        return view('votocandidatos.index',$datosVotocandidato);
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
        /*$datosRoles=Roles::all();
        $datosFuncionario=Funcionarios::all();
        $datosEleccion=Elecciones::all();*/
        return view('votocandidatos.create');

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
            'id'=>'required',
            'id_candidato'=>'required',
            'votos'=>'required',
            
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosVotocandidato=request()->except('_token');
        Votocandidatos::insert($datosVotocandidato);
        //return response()->json($datosCandidato);
        return redirect('votocandidatos')->with('Mensaje','Votos de candidato agregados agregado con exito');
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
        $votocandidato=Votocandidatos::findOrFail($id);
        return view('votocandidatos.edit',compact('votocandidato'));
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
            'id'=>'required',
            'id_candidato'=>'required',
            'votos'=>'required',
        ];
       
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosVotocandidato=request()->except(['_token','_method']);
        Votocandidatos::where('id','=',$id)->update($datosVotocandidato);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('votocandidatos')->with('Mensaje','Votos de candidato modificado con exito');
    }

    
    public function destroy($id)
    {
        $votocandidato=Votocandidatos::findOrFail($id);
        
        Votocandidatos::destroy($id);
        
        return redirect('votocandidatos')->with('Mensaje','Votos de candidato eliminado con exito');
    }
}