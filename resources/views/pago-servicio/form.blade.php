<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="fecha_pago" class="form-label">{{ __('Fecha Pago') }}</label>
            <input type="text" name="fecha_pago" class="form-control @error('fecha_pago') is-invalid @enderror" value="{{ old('fecha_pago', $pagoServicio?->fecha_pago) }}" id="fecha_pago" placeholder="Fecha Pago">
            {!! $errors->first('fecha_pago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="monto_total" class="form-label">{{ __('Monto Total') }}</label>
            <input type="text" name="monto_total" class="form-control @error('monto_total') is-invalid @enderror" value="{{ old('monto_total', $pagoServicio?->monto_total) }}" id="monto_total" placeholder="Monto Total">
            {!! $errors->first('monto_total', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_pago" class="form-label">{{ __('Tipo Pago') }}</label>
            <input type="text" name="tipo_pago" class="form-control @error('tipo_pago') is-invalid @enderror" value="{{ old('tipo_pago', $pagoServicio?->tipo_pago) }}" id="tipo_pago" placeholder="Tipo Pago">
            {!! $errors->first('tipo_pago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="observacion" class="form-label">{{ __('Observacion') }}</label>
            <input type="text" name="observacion" class="form-control @error('observacion') is-invalid @enderror" value="{{ old('observacion', $pagoServicio?->observacion) }}" id="observacion" placeholder="Observacion">
            {!! $errors->first('observacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>