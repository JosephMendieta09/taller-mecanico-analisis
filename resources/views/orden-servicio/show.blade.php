@extends('layouts.app')

@section('template_title')
    {{ $ordenServicio->name ?? __('Show') . " " . __('Orden Servicio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Orden Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('orden-servicios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Orden Trabajo Id:</strong>
                                    {{ $ordenServicio->orden_trabajo_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Servicio Id:</strong>
                                    {{ $ordenServicio->servicio_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio Servicio:</strong>
                                    {{ $ordenServicio->precio_servicio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mano Obra:</strong>
                                    {{ $ordenServicio->mano_obra }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
