
@extends('adminlte::page')

@section('title', 'Conciertos | Dashboard')

@section('content_header')
<div class="card-header">
        <h1>Conciertos</h1>
    <!-- Otros elementos de la cabecera... -->

    <!-- Formulario de Búsqueda -->
    <form action="{{ route('conciertos.index') }}" method="GET" class="float-right">
        <input type="text" name="search" id="searchInput" placeholder="Buscar en Conciertos">
        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
    </form>
</div>
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
<script>
    function searchFunction() {
        var input = document.getElementById("searchInput");
        var filter = input.value.toUpperCase();
        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");

        for (var i = 0; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[1]; // Ajusta este índice según la columna que quieres buscar
            if (td) {
                var txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@stop
