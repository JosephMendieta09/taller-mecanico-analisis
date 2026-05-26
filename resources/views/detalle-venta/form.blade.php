<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="venta_id" class="form-label">{{ __('Venta Id') }}</label>
            <input type="text" name="venta_id" class="form-control @error('venta_id') is-invalid @enderror" value="{{ old('venta_id', $detalleVenta?->venta_id) }}" id="venta_id" placeholder="Venta Id">
            {!! $errors->first('venta_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pago_venta_id" class="form-label">{{ __('Pago Venta Id') }}</label>
            <input type="text" name="pago_venta_id" class="form-control @error('pago_venta_id') is-invalid @enderror" value="{{ old('pago_venta_id', $detalleVenta?->pago_venta_id) }}" id="pago_venta_id" placeholder="Pago Venta Id">
            {!! $errors->first('pago_venta_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="monto_pagado" class="form-label">{{ __('Monto Pagado') }}</label>
            <input type="text" name="monto_pagado" class="form-control @error('monto_pagado') is-invalid @enderror" value="{{ old('monto_pagado', $detalleVenta?->monto_pagado) }}" id="monto_pagado" placeholder="Monto Pagado">
            {!! $errors->first('monto_pagado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="metodo_pago" class="form-label">{{ __('Metodo Pago') }}</label>
            <input type="text" name="metodo_pago" class="form-control @error('metodo_pago') is-invalid @enderror" value="{{ old('metodo_pago', $detalleVenta?->metodo_pago) }}" id="metodo_pago" placeholder="Metodo Pago">
            {!! $errors->first('metodo_pago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>