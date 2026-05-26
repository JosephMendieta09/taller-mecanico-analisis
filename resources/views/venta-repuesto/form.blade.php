<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="repuesto_id" class="form-label">{{ __('Repuesto Id') }}</label>
            <input type="text" name="repuesto_id" class="form-control @error('repuesto_id') is-invalid @enderror" value="{{ old('repuesto_id', $ventaRepuesto?->repuesto_id) }}" id="repuesto_id" placeholder="Repuesto Id">
            {!! $errors->first('repuesto_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="venta_id" class="form-label">{{ __('Venta Id') }}</label>
            <input type="text" name="venta_id" class="form-control @error('venta_id') is-invalid @enderror" value="{{ old('venta_id', $ventaRepuesto?->venta_id) }}" id="venta_id" placeholder="Venta Id">
            {!! $errors->first('venta_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
            <input type="text" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad', $ventaRepuesto?->cantidad) }}" id="cantidad" placeholder="Cantidad">
            {!! $errors->first('cantidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="subtotal" class="form-label">{{ __('Subtotal') }}</label>
            <input type="text" name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" value="{{ old('subtotal', $ventaRepuesto?->subtotal) }}" id="subtotal" placeholder="Subtotal">
            {!! $errors->first('subtotal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>