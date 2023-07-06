<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('concierto_id') }}
            {{ Form::text('concierto_id', $telonero->concierto_id, ['class' => 'form-control' . ($errors->has('concierto_id') ? ' is-invalid' : ''), 'placeholder' => 'Concierto Id']) }}
            {!! $errors->first('concierto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('concierto_id') }}
            {{ Form::select('concierto_id', $conciertos , $telonero->concierto_id, ['class' => 'form-control' . ($errors->has('concierto_id') ? ' is-invalid' : ''), 'placeholder' => 'Concierto Id']) }}
            {!! $errors->first('concierto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telonero') }}
            {{ Form::text('telonero', $telonero->telonero, ['class' => 'form-control' . ($errors->has('telonero') ? ' is-invalid' : ''), 'placeholder' => 'Telonero']) }}
            {!! $errors->first('telonero', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
