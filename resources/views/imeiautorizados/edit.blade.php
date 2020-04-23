@extends('layouts.app')

@section('content')

<div class="container">
<form  action="{{url('/imeiautorizados/'.$imeiautorizado->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
   @include('imeiautorizados.form',['Modo'=>'editar'])
   
</form>
</div>

@endsection