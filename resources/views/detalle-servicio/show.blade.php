@extends('layouts.app')

@section('template_title')
    {{ $detalleServicio->name ?? __('Show') . " " . __('Detalle Servicio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalle Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('detalle-servicios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Orden Trabajo Id:</strong>
                                    {{ $detalleServicio->orden_trabajo_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pago Servicio Id:</strong>
                                    {{ $detalleServicio->pago_servicio_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Monto Pagado:</strong>
                                    {{ $detalleServicio->monto_pagado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Metodo Pago:</strong>
                                    {{ $detalleServicio->metodo_pago }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
