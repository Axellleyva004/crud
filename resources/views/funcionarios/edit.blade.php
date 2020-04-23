@extends('layouts.app')

@section('content')

<div class="container">
<form  action="{{url('/funcionarios/'.$funcionario->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
   @include('funcionarios.form',['Modo'=>'editar'])
   
</form>
</div>

@endsection