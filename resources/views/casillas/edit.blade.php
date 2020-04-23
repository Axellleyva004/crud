@extends('layouts.app')
@section('content')

<div class="container">
<form  action="{{url('/casillas/'.$casilla->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
   @include('casillas.form',['Modo'=>'editar'])
   
</form>
</div>

@endsection