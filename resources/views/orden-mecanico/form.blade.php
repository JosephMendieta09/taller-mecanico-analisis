<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="orden_trabajo_id" class="form-label">{{ __('Orden Trabajo Id') }}</label>
            <input type="text" name="orden_trabajo_id" class="form-control @error('orden_trabajo_id') is-invalid @enderror" value="{{ old('orden_trabajo_id', $ordenMecanico?->orden_trabajo_id) }}" id="orden_trabajo_id" placeholder="Orden Trabajo Id">
            {!! $errors->first('orden_trabajo_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mecanico_id" class="form-label">{{ __('Mecanico Id') }}</label>
            <input type="text" name="mecanico_id" class="form-control @error('mecanico_id') is-invalid @enderror" value="{{ old('mecanico_id', $ordenMecanico?->mecanico_id) }}" id="mecanico_id" placeholder="Mecanico Id">
            {!! $errors->first('mecanico_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_asignacion" class="form-label">{{ __('Fecha Asignacion') }}</label>
            <input type="text" name="fecha_asignacion" class="form-control @error('fecha_asignacion') is-invalid @enderror" value="{{ old('fecha_asignacion', $ordenMecanico?->fecha_asignacion) }}" id="fecha_asignacion" placeholder="Fecha Asignacion">
            {!! $errors->first('fecha_asignacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>