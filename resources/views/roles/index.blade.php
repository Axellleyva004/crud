@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('roles/create')}}" class="btn btn-success">Agregar Rol</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $rol)
        <tr>
            <td>{{$rol->id}}</td>
        
            <td>{{$rol->descripcion}}</td>
            
            <td>
                <a class="btn btn-warning"href="{{url('/roles/'.$rol->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/roles/'.$rol->id)}}" style="display:inline">
                  {{csrf_field() }}
                  
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$roles->links()}}
</div>

@endsection