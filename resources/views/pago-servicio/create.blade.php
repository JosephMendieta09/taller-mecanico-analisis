@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Pago Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Pago Servicio</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('pago-servicios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pago-servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
