@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('funcionariocasillas/create')}}" class="btn btn-success">Agregar Elección</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>id funcionario</th>
            <th>id casilla</th>
            <th>id rol</th>
            <th>id elección</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($funcionariocasillas as $funcionariocasilla)
        <tr>
            <td>{{$funcionariocasilla->id}}</td>
            
            <td>{{$funcionariocasilla->id_funcionario}}</td>
            <td>{{$funcionariocasilla->id_casilla}}</td>
            <td>{{$funcionariocasilla->id_rol}}</td>
            <td>{{$funcionariocasilla->id_eleccion}}</td>
            
            
            
            <td>
                <a class="btn btn-warning"href="{{url('/funcionariocasillas/'.$funcionariocasilla->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/funcionariocasillas/'.$funcionariocasilla->id)}}" style="display:inline">
                  {{csrf_field() }}
                  
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$funcionariocasillas->links()}}
</div>

@endsection