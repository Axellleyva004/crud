{{$Modo=='crear'?'Agregar funcionario casilla':'Modificar funcionario casilla'}}
<br>

<div class="form-group">
   <label for="id_funcionario" class="control-label">{{'Funcionario ID'}}</label>
   <input type="number" class="form-control {{$errors->has('id_funcionario')?'is-invalid':''}} " name="id_funcionario" id="id_funcionario" value="{{isset($funcionariocasilla->id_funcionario)?$funcionariocasilla->id_funcionario:old('id_funcionario')}}">
   {!! $errors->first('id_funcionario','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="id_casilla" class="control-label">{{'Casilla ID'}}</label>
   <input type="number" class="form-control {{$errors->has('id_casilla')?'is-invalid':''}} " name="id_casilla" id="id_casilla" value="{{isset($funcionariocasilla->id_casilla)?$funcionariocasilla->id_casilla:old('id_casilla')}}">
   {!! $errors->first('id_casilla','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="id_rol" class="control-label">{{'Rol ID'}}</label>
   <input type="number" class="form-control {{$errors->has('id_rol')?'is-invalid':''}} " name="id_rol" id="id_rol" value="{{isset($funcionariocasilla->id_rol)?$funcionariocasilla->id_rol:old('id_rol')}}">
   {!! $errors->first('id_rol','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="id_eleccion" class="control-label">{{'Eleccion ID'}}</label>
   <input type="number" class="form-control {{$errors->has('id_eleccion')?'is-invalid':''}} " name="id_eleccion" id="id_eleccion" value="{{isset($funcionariocasilla->id_eleccion)?$funcionariocasilla->id_eleccion:old('id_eleccion')}}">
   {!! $errors->first('id_rol','<div class="invalid-feedback">:message</div>') !!}
   
</div>




<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('funcionariocasillas')}}">Regresar</a>