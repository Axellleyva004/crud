@extends('layouts.app')

@section('content')

<div class="container">
<form  action="{{url('/funcionariocasillas/'.$funcionariocasilla->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
   @include('funcionariocasillas.form',['Modo'=>'editar'])
   
</form>
</div>

@endsection