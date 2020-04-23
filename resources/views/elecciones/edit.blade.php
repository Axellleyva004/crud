@extends('layouts.app')

@section('content')

<div class="container">
<form  action="{{url('/elecciones/'.$eleccion->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
   @include('elecciones.form',['Modo'=>'editar'])
   
</form>
</div>

@endsection