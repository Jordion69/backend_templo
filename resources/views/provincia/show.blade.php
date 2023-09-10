@extends('layouts.app')

@section('template_title')
    {{ $provincia->name ?? "{{ __('Show') Provincia" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Provincia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('provincias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Comunidad Autonoma Id:</strong>
                            {{ $provincia->comunidad_autonoma_id }}
                        </div>
                        <div class="form-group">
                            <strong>Provincia:</strong>
                            {{ $provincia->provincia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
