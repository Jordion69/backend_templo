@extends('layouts.app')

@section('template_title')
    Noticia
@endsection

@extends('adminlte::page')

@section('title', 'Noticias | Dashboard')

@section('content_header')
    <h1>Noticias</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Noticia') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('noticias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Titular Inicial</th>
										<th>Texto Inicial</th>
										<th>Foto Inicio</th>
										<!-- <th>Alt Foto Inicio</th> -->
										<th>Titular</th>
										<!-- <th>Texto1</th>
										<th>Texto2</th>
										<th>Texto3</th>
										<th>Texto4</th>
										<th>Link Video</th>
										<th>Headline</th>
										<th>Text1</th>
										<th>Text2</th>
										<th>Text3</th>
										<th>Text4</th> -->
										<th>Palabras Clave</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($noticias as $noticia)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $noticia->titular_inicial }}</td>
											<td>{{ $noticia->texto_inicial }}</td>
											<td>
                                                <img src="{{ asset('storage') .'/' . $noticia->imagen}}" width="100" alt="">
                                            </td>
											<!-- <td>{{ $noticia->alt_foto_inicio }}</td> -->
											<td>{{ $noticia->titular }}</td>
											<!-- <td>{{ $noticia->texto1 }}</td>
											<td>{{ $noticia->texto2 }}</td>
											<td>{{ $noticia->texto3 }}</td>
											<td>{{ $noticia->texto4 }}</td>
											<td>{{ $noticia->link_video }}</td>
											<td>{{ $noticia->headline }}</td>
											<td>{{ $noticia->text1 }}</td>
											<td>{{ $noticia->text2 }}</td>
											<td>{{ $noticia->text3 }}</td>
											<td>{{ $noticia->text4 }}</td> -->
											<td>{{ $noticia->palabras_clave }}</td>

                                            <td>
                                                <form action="{{ route('noticias.destroy',$noticia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('noticias.show',$noticia->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('noticias.edit',$noticia->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $noticias->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
