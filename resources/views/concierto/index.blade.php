
@extends('adminlte::page')

@section('title', 'Conciertos | Dashboard')

@section('content_header')
    <h1>Conciertos</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Concierto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('conciertos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>id</th>
										<th>Nombre</th>
										<th>Sala</th>
										<th>Provincia</th>
										<th>Fecha Evento</th>
                                        <th>Imagen</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conciertos as $concierto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $concierto->id }}</td>
											<td>{{ $concierto->nombre }}</td>
											<td>{{ $concierto->sala }}</td>
											<td>{{ $concierto->provincia }}</td>
											<td>{{ $concierto->fecha_evento }}</td>
                                            <td>
                                                <img src="{{ asset('storage') .'/' . $concierto->imagen}}" width="200" alt="">
                                            </td>
                                            <td>
                                                <form action="{{ route('conciertos.destroy',$concierto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('conciertos.show',$concierto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('conciertos.edit',$concierto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $conciertos->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
