@extends('layouts.app')

@section('template_title')
    {{ $especialidadMecanico->name ?? __('Show') . " " . __('Especialidad Mecanico') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Especialidad Mecanico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('especialidad-mecanicos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Especialidad Id:</strong>
                                    {{ $especialidadMecanico->especialidad_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Mecanico Id:</strong>
                                    {{ $especialidadMecanico->mecanico_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Asignacion:</strong>
                                    {{ $especialidadMecanico->fecha_asignacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
