@extends('layouts.app')

@section('template_title')
    {{ $ordenMecanico->name ?? __('Show') . " " . __('Orden Mecanico') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Orden Mecanico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('orden-mecanicos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Orden Trabajo Id:</strong>
                                    {{ $ordenMecanico->orden_trabajo_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mecanico Id:</strong>
                                    {{ $ordenMecanico->mecanico_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Asignacion:</strong>
                                    {{ $ordenMecanico->fecha_asignacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
