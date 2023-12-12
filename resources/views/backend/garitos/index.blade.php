

@extends('adminlte::page')

@section('title', 'Garitos | Dashboard')

@section('content_header')
<div class="card-header">
        <h1>Garitos</h1>
    <!-- Otros elementos de la cabecera... -->

    <!-- Formulario de Búsqueda -->
    <form action="{{ route('garitos.index') }}" method="GET" class="float-right">
        <input type="text" name="search" id="searchInput" placeholder="Buscar en Garitos">
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
                                {{ __('Garito') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('garitos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover" id="myTable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre Garito</th>
										<!-- <th>Nombre Duenyo</th>
										<th>Direccion</th> -->
										<th>Poblacion</th>
										<th>Provincia</th>
										<!-- <th>Codigo Postal</th> -->
										<th>Comunidad Autonoma</th>
										<!-- <th>Telefono</th>
										<th>Telefono2</th>
										<th>Facebook</th>
										<th>Instagram</th>
										<th>Mail</th>
										<th>Frase</th>
										<th>Sentence</th> -->
										<th>Visitado</th>
										<th>Ratio Colaboracion</th>
										<th>Imagen</th>
										<!-- <th>Alt Imagen</th>
										<th>Latitud</th>
										<th>Longitud</th> -->
										<th>Tendencia</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($garitos as $garito)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $garito->nombre_garito }}</td>
											<!-- <td>{{ $garito->nombre_duenyo }}</td>
											<td>{{ $garito->direccion }}</td> -->
											<td>{{ $garito->poblacion }}</td>
											<td>{{ $garito->provincia }}</td>
											<!-- <td>{{ $garito->codigo_postal }}</td> -->
											<td>{{ $garito->comunidad_autonoma }}</td>
											<!-- <td>{{ $garito->telefono }}</td>
											<td>{{ $garito->telefono2 }}</td>
											<td>{{ $garito->facebook }}</td>
											<td>{{ $garito->instagram }}</td>
											<td>{{ $garito->mail }}</td>
											<td>{{ $garito->frase }}</td>
											<td>{{ $garito->sentence }}</td> -->
											<td>{{ $garito->visitado }}</td>
											<td>{{ $garito->ratio_colaboracion }}</td>
											<td>

                                                <img src="{{ asset('storage/' . $garito->imagen) }}" width="100" alt="">

                                            </td>
											<!-- <td>{{ $garito->alt_imagen }}</td>
											<td>{{ $garito->latitud }}</td>
											<td>{{ $garito->longitud }}</td> -->
											<td>{{ $garito->tendencia }}</td>

                                            <td>
                                                <form action="{{ route('garitos.destroy',$garito->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('garitos.show',$garito->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('garitos.edit',$garito->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $garitos->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
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

@section('plugins.Datatables', true)
