@extends('layouts.app')

@section('template_title')
    Provincia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Provincia') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('provincias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Comunidad Autonoma Id</th>
										<th>Provincia</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($provincias as $provincia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $provincia->comunidad_autonoma_id }}</td>
											<td>{{ $provincia->provincia }}</td>

                                            <td>
                                                <form action="{{ route('provincias.destroy',$provincia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('provincias.show',$provincia->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('provincias.edit',$provincia->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $provincias->links() !!}
            </div>
        </div>
    </div>
@endsection
