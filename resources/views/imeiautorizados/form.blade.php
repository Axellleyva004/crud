{{$Modo=='crear'?'Agregar imeiautorizado':'Modificar imeiautorizado'}}
<br>

<div class="form-group">
   <label for="id_funcionario" class="control-label">{{'Funcionario ID'}}</label>
   <input type="number" class="form-control {{$errors->has('id_funcionario')?'is-invalid':''}} " name="id_funcionario" id="id_funcionario" value="{{isset($imeiautorizado->id_funcionario)?$imeiautorizado->id_funcionario:old('id_funcionario')}}">
   {!! $errors->first('id_funcionario','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
   <label for="id_eleccion" class="control-label">{{'Elección ID'}}</label>
   <input type="number" class="form-control {{$errors->has('id_eleccion')?'is-invalid':''}} " name="id_eleccion" id="id_eleccion" value="{{isset($imeiautorizado->id_eleccion)?$imeiautorizado->id_eleccion:old('id_eleccion')}}">
   {!! $errors->first('id_eleccion','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
   <label for="id_casilla" class="control-label">{{'Casilla ID'}}</label>
   <input type="number" class="form-control {{$errors->has('id_casilla')?'is-invalid':''}} " name="id_casilla" id="id_casilla" value="{{isset($imeiautorizado->id_casilla)?$imeiautorizado->id_casilla:old('id_casilla')}}">
   {!! $errors->first('id_casilla','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
   <label for="imei" class="control-label">{{'Imei'}}</label>
   <input type="number" class="form-control {{$errors->has('imei')?'is-invalid':''}} " name="imei" id="imei" value="{{isset($imeiautorizado->imei)?$imeiautorizado->imei:old('imei')}}">
   {!! $errors->first('imei','<div class="invalid-feedback">:message</div>') !!}
</div>





<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('imeiautorizados')}}">Regresar</a>