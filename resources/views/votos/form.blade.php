{{$Modo=='crear'?'Agregar voto':'Modificar voto'}}
<br>
<div class="form-group">
   <label for="id_eleccion" class="control-label">{{'ID eleccion'}}</label>
   <input type="number" class="form-control {{$errors->has('id_eleccion')?'is-invalid':''}} " name="id_eleccion" id="id_eleccion" value="{{isset($voto->id_eleccion)?$voto->id_eleccion:old('id_eleccion')}}">
   {!! $errors->first('id_eleccion','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="id_casilla" class="control-label">{{'ID casilla'}}</label>
   <input type="number" class="form-control {{$errors->has('id_casilla')?'is-invalid':''}} " name="id_casilla" id="id_casilla" value="{{isset($voto->id_casilla)?$voto->id_casilla:old('id_casilla')}}">
   {!! $errors->first('id_casilla','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
<label for="evidencia" class="control-label">{{'Evidencia'}}</label>
@if(isset($voto->evidencia))

<img src="{{asset('storage').'/'.$voto->evidencia}}" class="img-thumbnail img-fluid" alt="" width="200">

@endif
<input type="file" class="form-control {{$errors->has('evidencia')?'is-invalid':''}}" name="evidencia" id="evidencia">
{!! $errors->first('evidencia','<div class="invalid-feedback">:message</div>') !!}
</div>


<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('roles')}}">Regresar</a>