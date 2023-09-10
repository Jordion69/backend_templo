@extends('layouts.app')

@section('template_title')
    {{ $comunidadesAutonoma->name ?? "{{ __('Show') Comunidades Autonoma" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Comunidades Autonoma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comunidades-autonomas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Comunidad:</strong>
                            {{ $comunidadesAutonoma->comunidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
