<?php

namespace App\Http\Controllers;

use App\Funcionarios;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatepdf()
    {
        $funcionario = Funcionarios::all();
        //print_r($casillas);exit;
        $pdf = PDF::loadView('funcionarios/index', ['funcionarios' => $funcionario]);
        return $pdf->download('archivo.pdf');
    }
    public function index()
    {
        $datosFuncionario['funcionarios']=Funcionarios::all();
        return view('funcionarios.index',$datosFuncionario);
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
        return view('funcionarios.create');

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
            'sexo'=>'required|string|max:1'
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosFuncionario=request()->except('_token');
        
        Funcionarios::insert($datosFuncionario);
        //return response()->json($datosCandidato);
        return redirect('funcionarios')->with('Mensaje','Candidato agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionarios $funcionarios)
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
        $funcionario=Funcionarios::findOrFail($id);
        return view('funcionarios.edit',compact('funcionario'));
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
            'sexo'=>'required|string|max:1'
        ];
       
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosFuncionario=request()->except(['_token','_method']);
    
        Funcionarios::where('id','=',$id)->update($datosFuncionario);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('funcionarios')->with('Mensaje','Candidato modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidato=Funcionarios::findOrFail($id);
        
        Funcionarios::destroy($id);
        
        return redirect('funcionarios')->with('Mensaje','Candidato eliminado con exito');
    }
}
