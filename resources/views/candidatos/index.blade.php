@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('candidatos/create')}}" class="btn btn-success">Agregar Candidato</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Perfil</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($candidatos as $candidato)
        <tr>
            <td>{{$candidato->id_candidato}}</td>
            <td>
                <img src="{{asset('storage').'/'.$candidato->foto}}" class="img-thumbnail img-fluid" alt="" width="150">
            
            </td>
            <td>{{$candidato->nombrecompleto}}</td>
            <td>{{$candidato->sexo}}</td>
            <td>{{$candidato->perfil}}</td>
            
            <td>
                <a class="btn btn-warning"href="{{url('/candidatos/'.$candidato->id.'/edit')}}">
                    Editar
                </a>
                <form  action="{{url('/candidatos/'.$candidato->id)}}" method="post" style="display:inline">
                  {{csrf_field() }}
                  
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$candidatos->links()}}
</div>

@endsection