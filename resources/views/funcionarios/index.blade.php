@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('funcionarios/create')}}" class="btn btn-success">Agregar Elección</a>
<a href="{{url('funcionarios/pdf')}}" class="btn btn-success">Descargar pdf</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre completo</th>
            <th>Sexo</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($funcionarios as $funcionario)
        <tr>
            <td>{{$funcionario->id}}</td>
            
            <td>{{$funcionario->nombrecompleto}}</td>
            <td>{{$funcionario->sexo}}</td>
            
            
            
            <td>
                <a class="btn btn-warning"href="{{url('/funcionarios/'.$funcionario->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/funcionarios/'.$funcionario->id)}}" style="display:inline">
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