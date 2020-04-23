@extends('layouts.app')

@section('content')

<div class="container">
<form  action="{{url('/votocandidatos/'.$votocandidato->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
   @include('votocandidatos.form',['Modo'=>'editar'])
   
</form>
</div>

@endsection