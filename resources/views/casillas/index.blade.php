@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('casillas/create')}}" class="btn btn-success">Agregar Casilla</a>
<a href="{{url('casillas/pdf')}}" class="btn btn-success">Descargar PDF</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Ubicacion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($casillas as $casilla)
        <tr>
            <td>{{$casilla->id}}</td>
            
            <td>{{$casilla->ubicacion}}</td>
            
            <td>
                <a class="btn btn-warning"href="{{url('/casillas/'.$casilla->id.'/edit')}}">
                    Editar
                </a>
                <form  action="{{url('/casillas/'.$casilla->id)}}" method="post" style="display:inline">
                  {{csrf_field() }}
                  
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection