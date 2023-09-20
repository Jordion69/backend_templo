<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <h3>Datos Generales</h3>
            <div class="col-6">
                <div class="form-group">
                    {{ Form::label('nombre_garito') }}
                    {{ Form::text('nombre_garito', $garito->nombre_garito, ['class' => 'form-control' . ($errors->has('nombre_garito') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Garito']) }}
                    {!! $errors->first('nombre_garito', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {{ Form::label('nombre_duenyo') }}
                    {{ Form::text('nombre_duenyo', $garito->nombre_duenyo, ['class' => 'form-control' . ($errors->has('nombre_duenyo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Duenyo']) }}
                    {!! $errors->first('nombre_duenyo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {{ Form::label('mail') }}
                    {{ Form::text('mail', $garito->mail, ['class' => 'form-control' . ($errors->has('mail') ? ' is-invalid' : ''), 'placeholder' => 'Mail']) }}
                    {!! $errors->first('mail', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('telefono') }}
                    {{ Form::text('telefono', $garito->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('telefono2') }}
                    {{ Form::text('telefono2', $garito->telefono2, ['class' => 'form-control' . ($errors->has('telefono2') ? ' is-invalid' : ''), 'placeholder' => 'Telefono2']) }}
                    {!! $errors->first('telefono2', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('direccion') }}
                    {{ Form::text('direccion', $garito->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('poblacion') }}
                    {{ Form::text('poblacion', $garito->poblacion, ['class' => 'form-control' . ($errors->has('poblacion') ? ' is-invalid' : ''), 'placeholder' => 'Poblacion']) }}
                    {!! $errors->first('poblacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <!-- {{ Form::label('provincia') }}
                    {{ Form::text('provincia', $garito->provincia, ['class' => 'form-control' . ($errors->has('provincia') ? ' is-invalid' : ''), 'placeholder' => 'Provincia']) }}
                    {!! $errors->first('provincia', '<div class="invalid-feedback">:message</div>') !!} -->
                    {{ Form::label('provincia', 'Provincia') }}
                    {{ Form::select('provincia',  $provincias, $garito->provincia, ['class' => 'form-control', 'placeholder' => 'Seleccione una provincia', 'id' => 'provincia']) }}
                    {!! $errors->first('provincia_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('codigo_postal') }}
                    {{ Form::text('codigo_postal', $garito->codigo_postal, ['class' => 'form-control' . ($errors->has('codigo_postal') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Postal']) }}
                    {!! $errors->first('codigo_postal', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-6 offset-6">
                <div class="form-group">
                    <!-- {{ Form::label('comunidad_autonoma') }}
                    {{ Form::text('comunidad_autonoma', $garito->comunidad_autonoma, ['class' => 'form-control' . ($errors->has('comunidad_autonoma') ? ' is-invalid' : ''), 'placeholder' => 'Comunidad Autonoma']) }}
                    {!! $errors->first('comunidad_autonoma', '<div class="invalid-feedback">:message</div>') !!} -->
                    {{ Form::label('comunidad_autonoma', 'Comunidad Autonoma') }}
                    {{ Form::text('comunidad_autonoma', $garito->comunidad_autonoma, ['class' => 'form-control', 'readonly' => 'readonly', 'id' => 'comunidad_autonoma']) }}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
        <h3>Redes Sociales</h3>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('facebook') }}
                    {{ Form::text('facebook', $garito->facebook, ['class' => 'form-control' . ($errors->has('facebook') ? ' is-invalid' : ''), 'placeholder' => 'Facebook']) }}
                    {!! $errors->first('facebook', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('instagram') }}
                    {{ Form::text('instagram', $garito->instagram, ['class' => 'form-control' . ($errors->has('instagram') ? ' is-invalid' : ''), 'placeholder' => 'Instagram']) }}
                    {!! $errors->first('instagram', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <h3>Datos Opcionales</h3>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('frase') }}
                    {{ Form::text('frase', $garito->frase, ['class' => 'form-control' . ($errors->has('frase') ? ' is-invalid' : ''), 'placeholder' => 'Frase']) }}
                    {!! $errors->first('frase', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('sentence') }}
                    {{ Form::text('sentence', $garito->sentence, ['class' => 'form-control' . ($errors->has('sentence') ? ' is-invalid' : ''), 'placeholder' => 'Sentence']) }}
                    {!! $errors->first('sentence', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('visitado') }}
                    {{ Form::text('visitado', $garito->visitado, ['class' => 'form-control' . ($errors->has('visitado') ? ' is-invalid' : ''), 'placeholder' => 'Visitado']) }}
                    {!! $errors->first('visitado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('ratio_colaboracion') }}
                    {{ Form::text('ratio_colaboracion', $garito->ratio_colaboracion, ['class' => 'form-control' . ($errors->has('ratio_colaboracion') ? ' is-invalid' : ''), 'placeholder' => 'Ratio Colaboracion']) }}
                    {!! $errors->first('ratio_colaboracion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('tendencia') }}
                    {{ Form::text('tendencia', $garito->tendencia, ['class' => 'form-control' . ($errors->has('tendencia') ? ' is-invalid' : ''), 'placeholder' => 'Tendencia']) }}
                    {!! $errors->first('tendencia', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('alt_imagen') }}
                    {{ Form::text('alt_imagen', $garito->alt_imagen, ['class' => 'form-control' . ($errors->has('alt_imagen') ? ' is-invalid' : ''), 'placeholder' => 'Alt Imagen']) }}
                    {!! $errors->first('alt_imagen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('latitud') }}
                    {{ Form::text('latitud', $garito->latitud, ['class' => 'form-control' . ($errors->has('latitud') ? ' is-invalid' : ''), 'placeholder' => 'Latitud']) }}
                    {!! $errors->first('latitud', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {{ Form::label('longitud') }}
                    {{ Form::text('longitud', $garito->longitud, ['class' => 'form-control' . ($errors->has('longitud') ? ' is-invalid' : ''), 'placeholder' => 'Longitud']) }}
                    {!! $errors->first('longitud', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <img src="{{ asset('storage') .'/' . $garito->imagen}}" width="100" alt="">
                    <input type="file" name="imagen" id="imagen">
                </div>
            </div>
            <div class="col-6">
                <!-- <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::text('imagen', $garito->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
            </div>
        </div>
    </div>
    <br>

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ route('garitos.index') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function() {
        $('#provincia_id').change(function() {
            var provinciaId = $(this).val();
            $.ajax({
                url: '/get-comunidad-autonoma/' + provinciaId, // Cambia la URL según tu configuración
                type: 'GET',
                success: function(data) {
                    $('#comunidad_autonoma').val(data);
                }
            });
        });
    });
</script>
@stop
