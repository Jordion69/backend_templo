@extends('layouts.app')

@section('template_title')
    {{ $noticia->name ?? "{{ __('Show') Noticia" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Noticia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('noticias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titular Inicial:</strong>
                            {{ $noticia->titular_inicial }}
                        </div>
                        <div class="form-group">
                            <strong>Texto Inicial:</strong>
                            {{ $noticia->texto_inicial }}
                        </div>
                        <div class="form-group">
                            <strong>Foto Inicio:</strong>
                            <img src="{{ asset('storage/' . $noticia->foto_inicio) }}" width="100" alt="">
                        </div>
                        <div class="form-group">
                            <strong>Alt Foto Inicio:</strong>
                            {{ $noticia->alt_foto_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Titular:</strong>
                            {{ $noticia->titular }}
                        </div>
                        <div class="form-group">
                            <strong>Texto1:</strong>
                            {{ $noticia->texto1 }}
                        </div>
                        <div class="form-group">
                            <strong>Texto2:</strong>
                            {{ $noticia->texto2 }}
                        </div>
                        <div class="form-group">
                            <strong>Texto3:</strong>
                            {{ $noticia->texto3 }}
                        </div>
                        <div class="form-group">
                            <strong>Texto4:</strong>
                            {{ $noticia->texto4 }}
                        </div>
                        <div class="form-group">
                            <strong>Link Video:</strong>
                            {{ $noticia->link_video }}
                        </div>
                        <div class="form-group">
                            <strong>Headline:</strong>
                            {{ $noticia->headline }}
                        </div>
                        <div class="form-group">
                            <strong>Text1:</strong>
                            {{ $noticia->text1 }}
                        </div>
                        <div class="form-group">
                            <strong>Text2:</strong>
                            {{ $noticia->text2 }}
                        </div>
                        <div class="form-group">
                            <strong>Text3:</strong>
                            {{ $noticia->text3 }}
                        </div>
                        <div class="form-group">
                            <strong>Text4:</strong>
                            {{ $noticia->text4 }}
                        </div>
                        <div class="form-group">
                            <strong>Palabras Clave:</strong>
                            {{ $noticia->palabras_clave }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
