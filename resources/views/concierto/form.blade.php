<div class="box box-info padding-1">
    <div class="box-body">
        <!-- <div class="form-group">
            <label for="imagen">Imagen</label>
            <img src="{{ asset('storage') .'/' . $concierto->imagen}}" width="100" alt="">
            <input type="file" name="imagen" id="imagen">
        </div> -->
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $concierto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('banda_principal') }}
            {{ Form::text('banda_principal', $concierto->banda_principal, ['class' => 'form-control' . ($errors->has('banda_principal') ? ' is-invalid' : ''), 'placeholder' => 'Banda Principal']) }}
            {!! $errors->first('banda_principal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sala') }}
            {{ Form::text('sala', $concierto->sala, ['class' => 'form-control' . ($errors->has('sala') ? ' is-invalid' : ''), 'placeholder' => 'Sala']) }}
            {!! $errors->first('sala', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $concierto->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('poblacion') }}
            {{ Form::text('poblacion', $concierto->poblacion, ['class' => 'form-control' . ($errors->has('poblacion') ? ' is-invalid' : ''), 'placeholder' => 'Poblacion']) }}
            {!! $errors->first('poblacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('provincia') }}
            {{ Form::text('provincia', $concierto->provincia, ['class' => 'form-control' . ($errors->has('provincia') ? ' is-invalid' : ''), 'placeholder' => 'Provincia']) }}
            {!! $errors->first('provincia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('link_entrada') }}
            {{ Form::text('link_entrada', $concierto->link_entrada, ['class' => 'form-control' . ($errors->has('link_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Link Entrada']) }}
            {!! $errors->first('link_entrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_evento') }}
            {{ Form::text('fecha_evento', $concierto->fecha_evento, ['type' => 'date', 'class' => 'form-control datepicker' . ($errors->has('fecha_evento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Evento']) }}
            {!! $errors->first('fecha_evento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="imagen">foto_logo</label>
            <img src="{{ asset('storage') .'/' . $concierto->imagen}}" width="100" alt="">
            <input type="file" name="imagen" id="imagen">
        </div>
        <div class="form-group">
            {{ Form::label('alt_imagen') }}
            {{ Form::text('alt_imagen', $concierto->alt_imagen, ['class' => 'form-control' . ($errors->has('alt_imagen') ? ' is-invalid' : ''), 'placeholder' => 'Alt Imagen']) }}
            {!! $errors->first('alt_imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd' // Establece el formato de fecha a 'YYYY-MM-DD'
        });
    });
</script>
@stop
