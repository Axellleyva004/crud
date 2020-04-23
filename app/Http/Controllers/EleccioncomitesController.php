<?php

namespace App\Http\Controllers;

use App\Roles;
use App\Funcionarios;
use App\Eleccioncomites;
use App\Elecciones;
use Illuminate\Http\Request;

class EleccioncomitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosEleccioncomite['eleccioncomites']=Eleccioncomites::paginate(5);
        return view('eleccioncomites.index',$datosEleccioncomite);
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
        return view('eleccioncomites.create');

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
            'id_funcionario'=>'required',
            'id_rol'=>'required'
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosEleccioncomite=request()->except('_token');
        Eleccioncomites::insert($datosEleccioncomite);
        //return response()->json($datosCandidato);
        return redirect('eleccioncomites')->with('Mensaje','Elelccion comite agregada con exito');
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
        $eleccioncomite=Eleccioncomites::findOrFail($id);
        return view('eleccioncomites.edit',compact('eleccioncomite'));
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
            'id_funcionario'=>'required',
            'id_rol'=>'required'
        ];
       
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEleccioncomite=request()->except(['_token','_method']);
        Eleccioncomites::where('id','=',$id)->update($datosEleccioncomite);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('eleccioncomites')->with('Mensaje','Elección comite modificada con exito');
    }

    
    public function destroy($id)
    {
        $eleccioncomite=Eleccioncomites::findOrFail($id);
        
        Eleccioncomites::destroy($id);
        
        return redirect('eleccioncomites')->with('Mensaje','Elección comite eliminada con exito');
    }
}
