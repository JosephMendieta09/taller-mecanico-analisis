@extends('layouts.app')

@section('template_title')
    {{ $detalleVenta->name ?? __('Show') . " " . __('Detalle Venta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalle Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('detalle-ventas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Venta Id:</strong>
                                    {{ $detalleVenta->venta_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pago Venta Id:</strong>
                                    {{ $detalleVenta->pago_venta_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Monto Pagado:</strong>
                                    {{ $detalleVenta->monto_pagado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Metodo Pago:</strong>
                                    {{ $detalleVenta->metodo_pago }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
