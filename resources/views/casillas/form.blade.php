{{$Modo=='crear'?'Agregar casilla':'Modificar casilla'}}
<br>

<div class="form-group">
   <label for="ubicacion" class="control-label">{{'Ubicación'}}</label>
   <input type="text" class="form-control {{$errors->has('ubicacion')?'is-invalid':''}} " name="ubicacion" id="ubicacion" value="{{isset($casilla->ubicacion)?$casilla->ubicacion:old('ubicacion')}}">
   {!! $errors->first('ubicacion','<div class="invalid-feedback">:message</div>') !!}
   
</div>


<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('casillas')}}">Regresar</a>