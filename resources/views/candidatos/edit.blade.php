@extends('layouts.app')

@section('content')

<div class="container">
<form  action="{{url('/candidatos/'.$candidato->id)}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}
   @include('candidatos.form',['Modo'=>'editar'])
   
</form>
</div>

@endsection