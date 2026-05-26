@extends('layouts.app')

@section('template_title')
    {{ $pagoServicio->name ?? __('Show') . " " . __('Pago Servicio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pago Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pago-servicios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Pago:</strong>
                                    {{ $pagoServicio->fecha_pago }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Monto Total:</strong>
                                    {{ $pagoServicio->monto_total }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Pago:</strong>
                                    {{ $pagoServicio->tipo_pago }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Observacion:</strong>
                                    {{ $pagoServicio->observacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
