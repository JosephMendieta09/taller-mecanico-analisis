<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="notificacion_id" class="form-label">{{ __('Notificacion Id') }}</label>
            <input type="text" name="notificacion_id" class="form-control @error('notificacion_id') is-invalid @enderror" value="{{ old('notificacion_id', $notificacionCliente?->notificacion_id) }}" id="notificacion_id" placeholder="Notificacion Id">
            {!! $errors->first('notificacion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cliente_id" class="form-label">{{ __('Cliente Id') }}</label>
            <input type="text" name="cliente_id" class="form-control @error('cliente_id') is-invalid @enderror" value="{{ old('cliente_id', $notificacionCliente?->cliente_id) }}" id="cliente_id" placeholder="Cliente Id">
            {!! $errors->first('cliente_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="leido" class="form-label">{{ __('Leido') }}</label>
            <input type="text" name="leido" class="form-control @error('leido') is-invalid @enderror" value="{{ old('leido', $notificacionCliente?->leido) }}" id="leido" placeholder="Leido">
            {!! $errors->first('leido', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>