@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('votos/create')}}" class="btn btn-success">Agregar Voto</a>
<a href="{{url('votos/pdf')}}" class="btn btn-success">Descargar pdf</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>id eleccion</th>
            <th>id casilla</th>
            <th>evidencia</th>
        </tr>
    </thead>
    <tbody>
        @foreach($votos as $voto)
        <tr>
            <td>{{$voto->id}}</td>
            <td>{{$voto->id_eleccion}}</td>
            <td>{{$voto->id_casilla}}</td>
           
            <td>
            {{$voto->evidencia}}
            </td>
            
            <td>
                <a class="btn btn-warning"href="{{url('/votos/'.$voto->id.'/edit')}}">
                    Editar
                </a>
                <form  action="{{url('/votos/'.$voto->id)}}" method="post" style="display:inline">
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