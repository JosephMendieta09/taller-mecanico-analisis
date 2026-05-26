@extends('layouts.app')

@section('template_title')
    Especialidad Mecanicos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Especialidad Mecanicos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('especialidad-mecanicos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Especialidad Id</th>
									<th >Mecanico Id</th>
									<th >Fecha Asignacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($especialidadMecanicos as $especialidadMecanico)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $especialidadMecanico->especialidad_id }}</td>
										<td >{{ $especialidadMecanico->mecanico_id }}</td>
										<td >{{ $especialidadMecanico->fecha_asignacion }}</td>

                                            <td>
                                                <form action="{{ route('especialidad-mecanicos.destroy', $especialidadMecanico->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('especialidad-mecanicos.show', $especialidadMecanico->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('especialidad-mecanicos.edit', $especialidadMecanico->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $especialidadMecanicos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
