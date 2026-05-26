<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="orden_trabajo_id" class="form-label">{{ __('Orden Trabajo Id') }}</label>
            <input type="text" name="orden_trabajo_id" class="form-control @error('orden_trabajo_id') is-invalid @enderror" value="{{ old('orden_trabajo_id', $ordenServicio?->orden_trabajo_id) }}" id="orden_trabajo_id" placeholder="Orden Trabajo Id">
            {!! $errors->first('orden_trabajo_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="servicio_id" class="form-label">{{ __('Servicio Id') }}</label>
            <input type="text" name="servicio_id" class="form-control @error('servicio_id') is-invalid @enderror" value="{{ old('servicio_id', $ordenServicio?->servicio_id) }}" id="servicio_id" placeholder="Servicio Id">
            {!! $errors->first('servicio_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio_servicio" class="form-label">{{ __('Precio Servicio') }}</label>
            <input type="text" name="precio_servicio" class="form-control @error('precio_servicio') is-invalid @enderror" value="{{ old('precio_servicio', $ordenServicio?->precio_servicio) }}" id="precio_servicio" placeholder="Precio Servicio">
            {!! $errors->first('precio_servicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="mano_obra" class="form-label">{{ __('Mano Obra') }}</label>
            <input type="text" name="mano_obra" class="form-control @error('mano_obra') is-invalid @enderror" value="{{ old('mano_obra', $ordenServicio?->mano_obra) }}" id="mano_obra" placeholder="Mano Obra">
            {!! $errors->first('mano_obra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>