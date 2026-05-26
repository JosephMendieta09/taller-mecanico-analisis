@extends('layouts.app')

@section('template_title')
    Pago Ventas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pago Ventas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pago-ventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Fecha Pago</th>
									<th >Monto Total</th>
									<th >Tipo Pago</th>
									<th >Observacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pagoVentas as $pagoVenta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $pagoVenta->fecha_pago }}</td>
										<td >{{ $pagoVenta->monto_total }}</td>
										<td >{{ $pagoVenta->tipo_pago }}</td>
										<td >{{ $pagoVenta->observacion }}</td>

                                            <td>
                                                <form action="{{ route('pago-ventas.destroy', $pagoVenta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pago-ventas.show', $pagoVenta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pago-ventas.edit', $pagoVenta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $pagoVentas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
