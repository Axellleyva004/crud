{{$Modo=='crear'?'Agregar eleccion comite':'Modificar eleccion comite'}}
<br>

<div class="form-group">
    <label for="id_eleccion" class="control-label">{{'Eleccion id'}}</label>
    <input type="number" class="form-control {{$errors->has('id_eleccion')?'is-invalid':''}} " name="id_eleccion" id="id_eleccion" value="{{isset($eleccioncomite->id_eleccion)?$eleccioncomite->id_eleccion:old('id_eleccion')}}">
    {!! $errors->first('id_eleccion','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
    <label for="id_funcionario" class="control-label">{{'Funcionario id'}}</label>
    <input type="number" class="form-control {{$errors->has('id_funcionario')?'is-invalid':''}} " name="id_funcionario" id="id_funcionario" value="{{isset($eleccioncomite->id_funcionario)?$eleccioncomite->id_funcionario:old('id_funcionario')}}">
    {!! $errors->first('id_eleccion','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
    <label for="id_rol" class="control-label">{{'Rol id'}}</label>
    <input type="number" class="form-control {{$errors->has('id_rol')?'is-invalid':''}} " name="id_rol" id="id_rol" value="{{isset($eleccioncomite->id_rol)?$eleccioncomite->id_rol:old('id_rol')}}">
    {!! $errors->first('id_rol','<div class="invalid-feedback">:message</div>') !!}

</div>


<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('eleccioncomites')}}">Regresar</a>