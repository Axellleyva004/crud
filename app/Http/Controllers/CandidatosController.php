<?php

namespace App\Http\Controllers;

use App\Candidatos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosCandidato['candidatos']=Candidatos::paginate(5);
        return view('candidatos.index',$datosCandidato);
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
        return view('candidatos.create');

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
            'nombrecompleto'=>'required|string|max:50',
            'sexo'=>'required|string|max:1',
            'perfil'=>'required|string|max:50',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg'
            
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosCandidato=request()->except('_token');
        if($request->hasFile('foto')){
            $datosCandidato['foto']=$request->file('foto')->store('uploads','public');

        }
        Candidatos::insert($datosCandidato);
        //return response()->json($datosCandidato);
        return redirect('candidatos')->with('Mensaje','Candidato agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function show(Candidatos $candidatos)
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
        $candidato=Candidatos::findOrFail($id);
        return view('candidatos.edit',compact('candidato'));
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
            'nombrecompleto'=>'required|string|max:50',
            'sexo'=>'required|string|max:1',
            'perfil'=>'required|string|max:50',
        ];
       
        if($request->hasFile('foto')){
            $campos+=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
        }
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosCandidato=request()->except(['_token','_method']);
        if($request->hasFile('foto')){
            $candidato=Candidatos::findOrFail($id);
            Storage::delete('public/'.$candidato->foto);
            $datosCandidato['foto']=$request->file('foto')->store('uploads','public');

        }
        Candidatos::where('id','=',$id)->update($datosCandidato);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('candidatos')->with('Mensaje','Candidato modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidato=Candidatos::findOrFail($id);
        if(Storage::delete('public/'.$candidato->foto))
        {
            Candidatos::destroy($id);
        }
        
        return redirect('candidatos')->with('Mensaje','Candidato eliminado con exito');
    }
}
