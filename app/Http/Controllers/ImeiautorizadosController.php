<?php

namespace App\Http\Controllers;

use App\Imeiautorizados;
use Illuminate\Http\Request;


class ImeiautorizadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosImeiautorizado['imeiautorizados']=Imeiautorizados::paginate(5);
        return view('imeiautorizados.index',$datosImeiautorizado);
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
        return view('imeiautorizados.create');

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
            'id_eleccion'=>'required',
            'id_casilla'=>'required',
            'imei'=>'required|string|max:20',
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosImeiautorizado=request()->except('_token');
        Imeiautorizados::insert($datosImeiautorizado);
        //return response()->json($datosCandidato);
        return redirect('imeiautorizados')->with('Mensaje','Imei autorizado agregado con exito');
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
        $imeiautorizado=Imeiautorizados::findOrFail($id);
        return view('imeiautorizados.edit',compact('imeiautorizado'));
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
            'id_eleccion'=>'required',
            'id_casilla'=>'required',
            'imei'=>'required|string|max:20',
        ];
       
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosImeiautorizado=request()->except(['_token','_method']);
        
        Imeiautorizados::where('id','=',$id)->update($datosImeiautorizado);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('imeiautorizados')->with('Mensaje','Imei autorizado modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imeiautorizado=Imeiautorizados::findOrFail($id);
        
        Imeiautorizados::destroy($id);

        
        return redirect('imeiautorizados')->with('Mensaje','Imei autorizado eliminado con exito');
    }
}
