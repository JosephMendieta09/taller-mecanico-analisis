@extends('layouts.app')

@section('template_title')
    {{ $ventaRepuesto->name ?? __('Show') . " " . __('Venta Repuesto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Venta Repuesto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('venta-repuestos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Repuesto Id:</strong>
                                    {{ $ventaRepuesto->repuesto_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Venta Id:</strong>
                                    {{ $ventaRepuesto->venta_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad:</strong>
                                    {{ $ventaRepuesto->cantidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Subtotal:</strong>
                                    {{ $ventaRepuesto->subtotal }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
