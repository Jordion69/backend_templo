@extends('layouts.app')

@section('template_title')
    {{ $garito->name ?? "{{ __('Show') Garito" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Garito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('garitos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Garito:</strong>
                            {{ $garito->nombre_garito }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Duenyo:</strong>
                            {{ $garito->nombre_duenyo }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $garito->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Poblacion:</strong>
                            {{ $garito->poblacion }}
                        </div>
                        <div class="form-group">
                            <strong>Provincia:</strong>
                            {{ $garito->provincia }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo Postal:</strong>
                            {{ $garito->codigo_postal }}
                        </div>
                        <div class="form-group">
                            <strong>Comunidad Autonoma:</strong>
                            {{ $garito->comunidad_autonoma }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $garito->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono2:</strong>
                            {{ $garito->telefono2 }}
                        </div>
                        <div class="form-group">
                            <strong>Facebook:</strong>
                            {{ $garito->facebook }}
                        </div>
                        <div class="form-group">
                            <strong>Instagram:</strong>
                            {{ $garito->instagram }}
                        </div>
                        <div class="form-group">
                            <strong>Mail:</strong>
                            {{ $garito->mail }}
                        </div>
                        <div class="form-group">
                            <strong>Frase:</strong>
                            {{ $garito->frase }}
                        </div>
                        <div class="form-group">
                            <strong>Sentence:</strong>
                            {{ $garito->sentence }}
                        </div>
                        <div class="form-group">
                            <strong>Visitado:</strong>
                            {{ $garito->visitado }}
                        </div>
                        <div class="form-group">
                            <strong>Ratio Colaboracion:</strong>
                            {{ $garito->ratio_colaboracion }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $garito->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Alt Imagen:</strong>
                            {{ $garito->alt_imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Latitud:</strong>
                            {{ $garito->latitud }}
                        </div>
                        <div class="form-group">
                            <strong>Longitud:</strong>
                            {{ $garito->longitud }}
                        </div>
                        <div class="form-group">
                            <strong>Tendencia:</strong>
                            {{ $garito->tendencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
