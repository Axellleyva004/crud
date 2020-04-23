{{$Modo=='crear'?'Agregar votos candidato':'Modificar votos candidato'}}
<br>

<div class="form-group">
   <label for="id" class="control-label">{{'ID'}}</label>
   <input type="number" class="form-control {{$errors->has('id')?'is-invalid':''}} " name="id" id="id" value="{{isset($votocandidato->id)?$votocandidato->id:old('id')}}">
   {!! $errors->first('id','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="id_candidato" class="control-label">{{'id candidato'}}</label>
   <input type="number" class="form-control {{$errors->has('id_candidato')?'is-invalid':''}} " name="id_candidato" id="id_candidato" value="{{isset($votocandidato->id_candidato)?$votocandidato->id_candidato:old('id_candidato')}}">
   {!! $errors->first('id_candidato','<div class="invalid-feedback">:message</div>') !!}
   
</div>

<div class="form-group">
   <label for="votos" class="control-label">{{'Votos'}}</label>
   <input type="number" class="form-control {{$errors->has('votos')?'is-invalid':''}} " name="votos" id="votos" value="{{isset($votocandidato->votos)?$votocandidato->votos:old('votos')}}">
   {!! $errors->first('votos','<div class="invalid-feedback">:message</div>') !!}
   
</div>


<input type="submit" class="btn btn-success" value="{{$Modo=='crear'?'Agregar':'Modificar'}}">
<a class="btn btn-primary" href="{{url('votocandidatos')}}">Regresar</a>