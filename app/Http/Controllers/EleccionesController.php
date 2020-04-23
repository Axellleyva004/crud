<?php

namespace App\Http\Controllers;

use App\Elecciones;
use Illuminate\Http\Request;

class EleccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosEleccion['elecciones']=Elecciones::paginate(5);
        return view('elecciones.index',$datosEleccion);
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
        return view('elecciones.create');

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
            'periodo'=>'required|string|max:50',
            'fechaapertura'=>'required',
            'horaapertura'=>'required',
            'fechacierre'=>'required',
            'horacierre'=>'required',
            'observaciones'=>'required|string|max:50',
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosEleccion=request()->except('_token');
        Elecciones::insert($datosEleccion);
        //return response()->json($datosCandidato);
        return redirect('elecciones')->with('Mensaje','Eleccion agregada con exito');
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
        $eleccion=Elecciones::findOrFail($id);
        return view('elecciones.edit',compact('eleccion'));
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
            'periodo'=>'required|string|max:50',
            'fechaapertura'=>'required',
            'horaapertura'=>'required',
            'fechacierre'=>'required',
            'horacierre'=>'required',
            'observaciones'=>'required|string|max:50',
        ];
       
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEleccion=request()->except(['_token','_method']);
        Elecciones::where('id','=',$id)->update($datosEleccion);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('elecciones')->with('Mensaje','Elección modificada con exito');
    }

    
    public function destroy($id)
    {
        $eleccion=Elecciones::findOrFail($id);
        
        Elecciones::destroy($id);
        
        return redirect('elecciones')->with('Mensaje','Elección eliminada con exito');
    }
}
