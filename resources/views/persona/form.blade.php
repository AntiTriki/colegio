
@if(isset($persona))
    {!! Form::model($persona,['method'=>'put','id'=>'frm']) !!}
@else
    {!! Form::open(['id'=>'frm']) !!}
@endif

<div class="modal-header">
    <h5 class="modal-title">{{isset($persona)?'Editar':'Nuevo'}} persona</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row">
        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

        <div class="col-md-6">
            <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

            @if ($errors->has('nombre'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

        <div class="col-md-6">
            <input id="apellido" type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ old('apellido') }}" required autofocus>

            @if ($errors->has('apellido'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="ci" class="col-md-4 col-form-label text-md-right">{{ __('ci') }}</label>

        <div class="col-md-6">
            <input id="ci" type="text" class="form-control{{ $errors->has('ci') ? ' is-invalid' : '' }}" name="ci" value="{{ old('ci') }}" required autofocus>

            @if ($errors->has('ci'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ci') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('direccion') }}</label>

        <div class="col-md-6">
            <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" required autofocus>

            @if ($errors->has('direccion'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('telefono') }}</label>

        <div class="col-md-6">
            <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required autofocus>

            @if ($errors->has('telefono'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="fecha_nac" class="col-md-4 col-form-label text-md-right">{{ __('fecha_nac') }}</label>

        <div class="col-md-6">
            <input id="fecha_nac" type="text" class="fecha form-control{{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" name="fecha_nac" value="{{ old('fecha_nac') }}" required autofocus>

            @if ($errors->has('fecha_nac'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_nac') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('genero') }}</label>

        <div class="col-md-6">
            {!! Form::select("genero",[1=>'Masculino',2=>'Femenino'],null,["class"=>"form-control"]) !!}
        </div>
    </div>

    <div class="form-group row">
        <label for="codigo" class="col-md-4 col-form-label text-md-right">{{ __('codigo') }}</label>

        <div class="col-md-6">
            <input id="codigo" type="text" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" value="{{ old('codigo') }}" required autofocus>

            @if ($errors->has('codigo'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('codigo') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('usuario') }}</label>

        <div class="col-md-6">
            <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" required autofocus>

            @if ($errors->has('usuario'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="id_tipopersona" class="col-md-4 col-form-label text-md-right">{{ __('id_tipopersona') }}</label>

        <div class="col-md-6">
            <select id="id_tipopersona" class="form-control" name="id_tipopersona">

                @foreach($tipopersonas as $tipopersona)
                    <option value="{{$tipopersona->id }}"  >{{$tipopersona->descripcion }}</option>
                @endforeach
            </select>

        </div>
    </div>



</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar</button>
    {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
</div>
{!! Form::close() !!}