@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('imeiautorizados/create')}}" class="btn btn-success">Agregar Imei autorizado</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Id funcionario</th>
            <th>Id eleccion</th>
            <th>Id casilla</th>
            <th>Imei</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach($imeiautorizados as $imeiautorizado)
        <tr>
            <td>{{$imeiautorizado->id}}</td>
            
            <td>{{$imeiautorizado->id_funcionario}}</td>
            <td>{{$imeiautorizado->id_eleccion}}</td>
            <td>{{$imeiautorizado->id_casilla}}</td>
            <td>{{$imeiautorizado->imei}}</td>
            
            
            
            <td>
                <a class="btn btn-warning"href="{{url('/imeiautorizados/'.$imeiautorizado->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/imeiautorizados/'.$imeiautorizado->id)}}" style="display:inline">
                  {{csrf_field() }}
                  
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$imeiautorizados->links()}}
</div>

@endsection