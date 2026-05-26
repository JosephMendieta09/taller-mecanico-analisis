@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Especialidad Mecanico
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Especialidad Mecanico</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('especialidad-mecanicos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('especialidad-mecanico.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
