@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('elecciones/create')}}" class="btn btn-success">Agregar Elección</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Periodo</th>
            <th>Fecha creación</th>
            <th>Fecha apertura</th>
            <th>Hora apertura</th>
            <th>Fecha cierre</th>
            <th>Hora cierre</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($elecciones as $eleccion)
        <tr>
            <td>{{$eleccion->id}}</td>
            
            <td>{{$eleccion->periodo}}</td>
            <td>{{$eleccion->fecha}}</td>
            <td>{{$eleccion->fechaapertura}}</td>
            <td>{{$eleccion->horaapertura}}</td>
            <td>{{$eleccion->fechacierre}}</td>
            <td>{{$eleccion->horacierre}}</td>
            <td>{{$eleccion->observaciones}}</td>
            
            
            <td>
                <a class="btn btn-warning"href="{{url('/elecciones/'.$eleccion->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/elecciones/'.$eleccion->id)}}" style="display:inline">
                  {{csrf_field() }}
                  
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$elecciones->links()}}
</div>

@endsection