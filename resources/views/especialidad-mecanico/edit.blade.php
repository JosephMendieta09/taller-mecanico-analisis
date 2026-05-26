@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Especialidad Mecanico
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Especialidad Mecanico</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('especialidad-mecanicos.update', $especialidadMecanico->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('especialidad-mecanico.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
