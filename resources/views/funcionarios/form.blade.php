{{$Modo=='crear'?'Agregar funcionario':'Modificar funcionario'}}
<br>

<div class="form-group">
   <label for="nombrecompleto" class="control-label">{{'Nombre completo'}}</label>
   <input type="text" class="form-control {{$errors->has('nombrecompleto')?'is-invalid':''}} " name="nombrecompleto" id="nombrecompleto" value="{{isset($funcionario->nombrecompleto)?$funcionario->nombrecompleto:old('nombrecompleto')}}">
   {!! $errors->first('nombrecompleto','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="sexo" class="control-label">{{'Sexo'}}</label>
   <input type="text" class="form-control {{$errors->has('sexo')?'is-invalid':''}}" name="sexo" id="sexo" value="{{isset($funcionario->sexo)?$funcionario->sexo:old('sexo')}}">
   {!! $errors->first('sexo','<div class="invalid-feedback">:message</div>') !!}
</div>



<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('funcionarios')}}">Regresar</a>