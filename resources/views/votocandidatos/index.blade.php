@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>
@endif
<br>
<a href="{{url('votocandidatos/create')}}" class="btn btn-success">Agregar votos candidato</a>
<a href="{{url('votocandidatos/pdf')}}" class="btn btn-success">Descargar pdf</a>
<br>
<br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>id candidato</th>
            <th>votos </th>
        </tr>
    </thead>
    <tbody>
        @foreach($votocandidatos as $votocandidato)
        <tr>
            <td>{{$votocandidato->id}}</td>
        
            <td>{{$votocandidato->id_candidato}}</td>

            <td>{{$votocandidato->votos}}</td>
            
            <td>
                <a class="btn btn-warning"href="{{url('/votocandidatos/'.$votocandidato->id.'/edit')}}">
                    Editar
                </a>
                <form method="post" action="{{url('/votocandidatos/'.$votocandidato->id)}}" style="display:inline">
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