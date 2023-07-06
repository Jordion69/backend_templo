@extends('layouts.app')

@section('template_title')
    {{ $telonero->name ?? "{{ __('Show') Telonero" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Telonero</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('teloneros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Concierto Id:</strong>
                            {{ $telonero->concierto_id }}
                        </div>
                        <div class="form-group">
                            <strong>Telonero:</strong>
                            {{ $telonero->telonero }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
