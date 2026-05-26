<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="orden_trabajo_id" class="form-label">{{ __('Orden Trabajo Id') }}</label>
            <input type="text" name="orden_trabajo_id" class="form-control @error('orden_trabajo_id') is-invalid @enderror" value="{{ old('orden_trabajo_id', $detalleServicio?->orden_trabajo_id) }}" id="orden_trabajo_id" placeholder="Orden Trabajo Id">
            {!! $errors->first('orden_trabajo_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pago_servicio_id" class="form-label">{{ __('Pago Servicio Id') }}</label>
            <input type="text" name="pago_servicio_id" class="form-control @error('pago_servicio_id') is-invalid @enderror" value="{{ old('pago_servicio_id', $detalleServicio?->pago_servicio_id) }}" id="pago_servicio_id" placeholder="Pago Servicio Id">
            {!! $errors->first('pago_servicio_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="monto_pagado" class="form-label">{{ __('Monto Pagado') }}</label>
            <input type="text" name="monto_pagado" class="form-control @error('monto_pagado') is-invalid @enderror" value="{{ old('monto_pagado', $detalleServicio?->monto_pagado) }}" id="monto_pagado" placeholder="Monto Pagado">
            {!! $errors->first('monto_pagado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="metodo_pago" class="form-label">{{ __('Metodo Pago') }}</label>
            <input type="text" name="metodo_pago" class="form-control @error('metodo_pago') is-invalid @enderror" value="{{ old('metodo_pago', $detalleServicio?->metodo_pago) }}" id="metodo_pago" placeholder="Metodo Pago">
            {!! $errors->first('metodo_pago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>