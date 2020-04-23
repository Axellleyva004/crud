{{$Modo=='crear'?'Agregar candidato':'Modificar empleado'}}
<br>
<div class="form-group">
   <label for="nombre" class="control-label">{{'Nombre completo'}}</label>
   <input type="text" class="form-control {{$errors->has('nombrecompleto')?'is-invalid':''}} " name="nombrecompleto" id="nombrecompleto" value="{{isset($candidato->nombrecompleto)?$candidato->nombrecompleto:old('nombrecompleto')}}">
   {!! $errors->first('nombrecompleto','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="sexo" class="control-label">{{'Sexo'}}</label>
   <input type="text" class="form-control {{$errors->has('sexo')?'is-invalid':''}}" name="sexo" id="sexo" value="{{isset($candidato->sexo)?$candidato->sexo:old('sexo')}}">
   {!! $errors->first('sexo','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
   <label for="perfil" class="control-label">{{'Perfil'}}</label>
   <input type="text" class="form-control {{$errors->has('perfil')?'is-invalid':''}}" name="perfil" id="perfil" value="{{isset($candidato->perfil)?$candidato->perfil:old('perfil')}}">
   {!! $errors->first('perfil','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="foto" class="control-label">{{'Foto'}}</label>
@if(isset($candidato->foto))

<img src="{{asset('storage').'/'.$candidato->foto}}" class="img-thumbnail img-fluid" alt="" width="200">

@endif
<input type="file" class="form-control {{$errors->has('foto')?'is-invalid':''}}" name="foto" id="foto">
{!! $errors->first('foto','<div class="invalid-feedback">:message</div>') !!}
</div>


<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('candidatos')}}">Regresar</a>