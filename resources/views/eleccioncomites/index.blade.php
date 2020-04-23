@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('eleccioncomites/create')}}" class="btn btn-success">Agregar Elección comite</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>id eleccion</th>
            <th>id funcionario</th>
            <th>id rol</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($eleccioncomites as $eleccioncomite)
        <tr>
            <td>{{$eleccioncomite->id}}</td>
            
            <td>{{$eleccioncomite->id_eleccion}}</td>
            <td>{{$eleccioncomite->id_funcionario}}</td>
            <td>{{$eleccioncomite->id_rol}}</td>
        
            <td>
                <a class="btn btn-warning"href="{{url('/eleccioncomites/'.$eleccioncomite->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/eleccioncomites/'.$eleccioncomite->id)}}" style="display:inline">
                  {{csrf_field() }}
                  
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$eleccioncomites->links()}}
</div>

@endsection