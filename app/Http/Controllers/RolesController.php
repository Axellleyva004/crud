<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosRol['roles']=Roles::paginate(5);
        return view('roles.index',$datosRol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(/*Request $request*/)
    {
        return view('roles.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'descripcion'=>'required|string|max:100',
            
        ];
        $Mensaje=["required"=>':attribute es requerido'];
        


        $this->validate($request,$campos,$Mensaje);
        $datosRol=request()->except('_token');
        
        Roles::insert($datosRol);
        //return response()->json($datosCandidato);
        return redirect('roles')->with('Mensaje','Rol agregado con exito');
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
        $rol=Roles::findOrFail($id);
        return view('roles.edit',compact('rol'));
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
            'descripcion'=>'required|string|max:70'
        ];
       
        $Mensaje=["required"=>':attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosRol=request()->except(['_token','_method']);
        
        Roles::where('id','=',$id)->update($datosRol);

        //$candidato=Candidatos::findOrFail($id);
        //return view('candidatos.edit',compact('candidato'));
        return redirect('roles')->with('Mensaje','Rol modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidatos  $candidatos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol=Roles::findOrFail($id);
        Roles::destroy($id);
        
        return redirect('roles')->with('Mensaje','Rol eliminado con exito');
    }
}
