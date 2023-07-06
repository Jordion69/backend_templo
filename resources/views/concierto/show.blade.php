@extends('layouts.app')

@section('template_title')
    {{ $concierto->name ?? "{{ __('Show') Concierto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Concierto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('conciertos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $concierto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Banda Principal:</strong>
                            {{ $concierto->banda_principal }}
                        </div>
                        <div class="form-group">
                            <strong>Sala:</strong>
                            {{ $concierto->sala }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $concierto->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Poblacion:</strong>
                            {{ $concierto->poblacion }}
                        </div>
                        <div class="form-group">
                            <strong>Provincia:</strong>
                            {{ $concierto->provincia }}
                        </div>
                        <div class="form-group">
                            <strong>Link Entrada:</strong>
                            {{ $concierto->link_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Evento:</strong>
                            {{ $concierto->fecha_evento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
