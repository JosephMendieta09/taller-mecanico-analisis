<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="especialidad_id" class="form-label">{{ __('Especialidad Id') }}</label>
            <input type="text" name="especialidad_id" class="form-control @error('especialidad_id') is-invalid @enderror" value="{{ old('especialidad_id', $especialidadMecanico?->especialidad_id) }}" id="especialidad_id" placeholder="Especialidad Id">
            {!! $errors->first('especialidad_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mecanico_id" class="form-label">{{ __('Mecanico Id') }}</label>
            <input type="text" name="mecanico_id" class="form-control @error('mecanico_id') is-invalid @enderror" value="{{ old('mecanico_id', $especialidadMecanico?->mecanico_id) }}" id="mecanico_id" placeholder="Mecanico Id">
            {!! $errors->first('mecanico_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_asignacion" class="form-label">{{ __('Fecha Asignacion') }}</label>
            <input type="text" name="fecha_asignacion" class="form-control @error('fecha_asignacion') is-invalid @enderror" value="{{ old('fecha_asignacion', $especialidadMecanico?->fecha_asignacion) }}" id="fecha_asignacion" placeholder="Fecha Asignacion">
            {!! $errors->first('fecha_asignacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>