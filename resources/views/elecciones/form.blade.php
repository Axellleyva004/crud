{{$Modo=='crear'?'Agregar eleccion':'Modificar eleccion'}}
<br>

<div class="form-group">
   <label for="periodo" class="control-label">{{'Periodo'}}</label>
   <input type="text" class="form-control {{$errors->has('periodo')?'is-invalid':''}} " name="periodo" id="periodo" value="{{isset($eleccion->periodo)?$eleccion->periodo:old('periodo')}}">
   {!! $errors->first('periodo','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="fechaapertura" class="control-label">{{'Fecha de apertura'}}</label>
   <input type="date" class="form-control {{$errors->has('fechaapertura')?'is-invalid':''}} " name="fechaapertura" id="fechaapertura" value="{{isset($eleccion->fechaapertura)?$eleccion->fechaapertura:old('fechaapertura')}}">
   {!! $errors->first('fechaapertura','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="horaapertura" class="control-label">{{'Hora de apertura'}}</label>
   <input type="time" class="form-control {{$errors->has('horaapertura')?'is-invalid':''}} " name="horaapertura" id="horaapertura" value="{{isset($eleccion->horaapertura)?$eleccion->horaapertura:old('horaapertura')}}">
   {!! $errors->first('horaapertura','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="fechacierre" class="control-label">{{'Fecha de cierre'}}</label>
   <input type="date" class="form-control {{$errors->has('fechacierre')?'is-invalid':''}} " name="fechacierre" id="fechacierre" value="{{isset($eleccion->fechacierre)?$eleccion->fechacierre:old('fechacierre')}}">
   {!! $errors->first('fechacierre','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="horacierre" class="control-label">{{'Hora de cierre'}}</label>
   <input type="time" class="form-control {{$errors->has('horacierre')?'is-invalid':''}} " name="horacierre" id="horacierre" value="{{isset($eleccion->horacierre)?$eleccion->horacierre:old('horacierre')}}">
   {!! $errors->first('horacierre','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="observaciones" class="control-label">{{'Observaciones'}}</label>
   <input type="text" class="form-control {{$errors->has('observaciones')?'is-invalid':''}}" name="observaciones" id="observaciones" value="{{isset($eleccion->observaciones)?$eleccion->observaciones:old('observaciones')}}">
   {!! $errors->first('observaciones','<div class="invalid-feedback">:message</div>') !!}
</div>



<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('elecciones')}}">Regresar</a>