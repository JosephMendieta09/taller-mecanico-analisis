@extends('layouts.app')

@section('template_title')
    {{ $pagoVenta->name ?? __('Show') . " " . __('Pago Venta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pago Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pago-ventas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Pago:</strong>
                                    {{ $pagoVenta->fecha_pago }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Monto Total:</strong>
                                    {{ $pagoVenta->monto_total }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Pago:</strong>
                                    {{ $pagoVenta->tipo_pago }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Observacion:</strong>
                                    {{ $pagoVenta->observacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
