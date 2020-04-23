<?php

namespace App\Http\Controllers;

use App\Funcionariocasillas;
use Illuminate\Http\Request;

class FuncionariocasillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosFuncionariocasilla['funcionariocasillas']=Funcionariocasillas::paginate(5);
        return view('funcionariocasillas.index',$datosFuncionariocasilla);
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
        return view('funcionariocasillas.create');

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
            'id_funcionario'=>'required',
            'id_casilla'=>'required',
            'id_rol'=>'required',
            'id_eleccion'=>'required',
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosFuncionariocasilla=request()->except('_token');
        Funcionariocasillas::insert($datosFuncionariocasilla);
        //return response()->json($datosCandidato);
        return redirect('funcionariocasillas')->with('Mensaje','Funcionario de casilla agregado con exito');
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
        $funcionariocasilla=Funcionariocasillas::findOrFail($id);
        return view('funcionariocasillas.edit',compact('funcionariocasilla'));
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
            'id_funcionario'=>'required',
            'id_casilla'=>'required',
            'id_rol'=>'required',
            'id_eleccion'=>'required',
        ];
       
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosFuncionariocasilla=request()->except(['_token','_method']);
        Funcionariocasillas::where('id','=',$id)->update($datosFuncionariocasilla);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('funcionariocasillas')->with('Mensaje','Elección comite modificada con exito');
    }

    
    public function destroy($id)
    {
        $funcionariocasilla=Funcionariocasillas::findOrFail($id);
        
        Funcionariocasillas::destroy($id);
        
        return redirect('funcionariocasillas')->with('Mensaje','Funcionario de casilla  eliminado con exito');
    }
}