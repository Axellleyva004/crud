{{$Modo=='crear'?'Agregar rol':'Modificar rol'}}
<br>
<div class="form-group">
   <label for="descripcion" class="control-label">{{'Descripción'}}</label>
   <input type="text" class="form-control {{$errors->has('descripcion')?'is-invalid':''}} " name="descripcion" id="descripcion" value="{{isset($rol->descripcion)?$rol->descripcion:old('descripcion')}}">
   {!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
   
</div>


<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('roles')}}">Regresar</a>