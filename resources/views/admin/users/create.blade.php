@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="pull-left">Crear nuevo usuario</h2>
            <a class="btn btn-primary pull-right" href="{{ route('users.index') }}"> Volver</a>
        </div>
    </div>
<br/>
    <form method="post" action="{{ route('users.store') }}" >
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" placeholder="Nombre" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="email" name="email" placeholder="Correo" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contraseña:</strong>
                    <input type="password" name="password" placeholder="Contraseña" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirmar contraseña:</strong>
                    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select class="form-control" name="roles[]" >
                      <option selected>Seleccionar rol</option>
                      @foreach($roles as $role)
                        <option value="{{ $role->id }}"> {{ $role->name }} </option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br/>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </form>
</div>

@endsection
