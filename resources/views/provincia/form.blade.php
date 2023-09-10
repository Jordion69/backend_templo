<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('comunidad_autonoma_id') }}
            {{ Form::text('comunidad_autonoma_id', $provincia->comunidad_autonoma_id, ['class' => 'form-control' . ($errors->has('comunidad_autonoma_id') ? ' is-invalid' : ''), 'placeholder' => 'Comunidad Autonoma Id']) }}
            {!! $errors->first('comunidad_autonoma_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('provincia') }}
            {{ Form::text('provincia', $provincia->provincia, ['class' => 'form-control' . ($errors->has('provincia') ? ' is-invalid' : ''), 'placeholder' => 'Provincia']) }}
            {!! $errors->first('provincia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>