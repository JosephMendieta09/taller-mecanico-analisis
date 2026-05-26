@extends('layouts.app')

@section('template_title')
    Detalle Servicios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle Servicios') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalle-servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Orden Trabajo Id</th>
									<th >Pago Servicio Id</th>
									<th >Monto Pagado</th>
									<th >Metodo Pago</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalleServicios as $detalleServicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $detalleServicio->orden_trabajo_id }}</td>
										<td >{{ $detalleServicio->pago_servicio_id }}</td>
										<td >{{ $detalleServicio->monto_pagado }}</td>
										<td >{{ $detalleServicio->metodo_pago }}</td>

                                            <td>
                                                <form action="{{ route('detalle-servicios.destroy', $detalleServicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalle-servicios.show', $detalleServicio->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalle-servicios.edit', $detalleServicio->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $detalleServicios->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
