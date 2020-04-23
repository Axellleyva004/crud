@extends('layouts.app')

@section('content')

<div class="container">
<form  action="{{url('/roles/'.$rol->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
   @include('roles.form',['Modo'=>'editar'])
   
</form>
</div>

@endsection