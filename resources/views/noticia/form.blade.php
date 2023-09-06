<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container-fluid">
            <h3>Titulares</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('titular_inicial') }}
                        {{ Form::text('titular_inicial', $noticia->titular_inicial, ['class' => 'form-control' . ($errors->has('titular_inicial') ? ' is-invalid' : ''), 'placeholder' => 'Titular Inicial']) }}
                        {!! $errors->first('titular_inicial', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('texto_inicial') }}
                        {{ Form::text('texto_inicial', $noticia->texto_inicial, ['class' => 'form-control' . ($errors->has('texto_inicial') ? ' is-invalid' : ''), 'placeholder' => 'Texto Inicial']) }}
                        {!! $errors->first('texto_inicial', '<div class="invalid-feedback">:message</div>') !!}
                     </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('titular') }}
                        {{ Form::text('titular', $noticia->titular, ['class' => 'form-control' . ($errors->has('titular') ? ' is-invalid' : ''), 'placeholder' => 'Titular']) }}
                        {!! $errors->first('titular', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('headline') }}
                        {{ Form::text('headline', $noticia->headline, ['class' => 'form-control' . ($errors->has('headline') ? ' is-invalid' : ''), 'placeholder' => 'Headline']) }}
                        {!! $errors->first('headline', '<div class="invalid-feedback">:message</div>') !!}
                     </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="foto_inicio">foto_inicio</label>
                        <img src="{{ asset('storage/' . $noticia->foto_inicio) }}" width="100" alt="">
                        <input type="file" name="foto_inicio" id="foto_inicio">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('alt_foto_inicio') }}
                        {{ Form::text('alt_foto_inicio', $noticia->alt_foto_inicio, ['class' => 'form-control' . ($errors->has('alt_foto_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Alt Foto Inicio']) }}
                        {!! $errors->first('alt_foto_inicio', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('link_video') }}
                        {{ Form::text('link_video', $noticia->link_video, ['class' => 'form-control' . ($errors->has('link_video') ? ' is-invalid' : ''), 'placeholder' => 'Link Video']) }}
                        {!! $errors->first('link_video', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('palabras_clave') }}
                        {{ Form::text('palabras_clave', $noticia->palabras_clave, ['class' => 'form-control' . ($errors->has('palabras_clave') ? ' is-invalid' : ''), 'placeholder' => 'Palabras Clave']) }}
                        {!! $errors->first('palabras_clave', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <h3>Texto</h3>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('texto1') }}
                        {{ Form::text('texto1', $noticia->texto1, ['class' => 'form-control' . ($errors->has('texto1') ? ' is-invalid' : ''), 'placeholder' => 'Texto1']) }}
                        {!! $errors->first('texto1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('text1') }}
                        {{ Form::text('text1', $noticia->text1, ['class' => 'form-control' . ($errors->has('text1') ? ' is-invalid' : ''), 'placeholder' => 'Text1']) }}
                        {!! $errors->first('text1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('texto2') }}
                        {{ Form::text('texto2', $noticia->texto2, ['class' => 'form-control' . ($errors->has('texto2') ? ' is-invalid' : ''), 'placeholder' => 'Texto2']) }}
                        {!! $errors->first('texto2', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('text2') }}
                        {{ Form::text('text2', $noticia->text2, ['class' => 'form-control' . ($errors->has('text2') ? ' is-invalid' : ''), 'placeholder' => 'Text2']) }}
                        {!! $errors->first('text2', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('texto3') }}
                        {{ Form::text('texto3', $noticia->texto3, ['class' => 'form-control' . ($errors->has('texto3') ? ' is-invalid' : ''), 'placeholder' => 'Texto3']) }}
                        {!! $errors->first('texto3', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('text3') }}
                        {{ Form::text('text3', $noticia->text3, ['class' => 'form-control' . ($errors->has('text3') ? ' is-invalid' : ''), 'placeholder' => 'Text3']) }}
                        {!! $errors->first('text3', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('texto4') }}
                        {{ Form::text('texto4', $noticia->texto4, ['class' => 'form-control' . ($errors->has('texto4') ? ' is-invalid' : ''), 'placeholder' => 'Texto4']) }}
                        {!! $errors->first('texto4', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('text4') }}
                        {{ Form::text('text4', $noticia->text4, ['class' => 'form-control' . ($errors->has('text4') ? ' is-invalid' : ''), 'placeholder' => 'Text4']) }}
                        {!! $errors->first('text4', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt-5">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

















