@extends('layouts.app')

@section('template_title')
    Notificacion Clientes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Notificacion Clientes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('notificacion-clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Notificacion Id</th>
									<th >Cliente Id</th>
									<th >Leido</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notificacionClientes as $notificacionCliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $notificacionCliente->notificacion_id }}</td>
										<td >{{ $notificacionCliente->cliente_id }}</td>
										<td >{{ $notificacionCliente->leido }}</td>

                                            <td>
                                                <form action="{{ route('notificacion-clientes.destroy', $notificacionCliente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('notificacion-clientes.show', $notificacionCliente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('notificacion-clientes.edit', $notificacionCliente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $notificacionClientes->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
