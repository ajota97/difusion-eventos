@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actualizar Usuario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Volver</a>
            </div>
        </div>
    </div>

    <form method="post" action="{{ route('users.update', $user->id) }}" >
        @method('put')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $user->name }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="email" name="email" placeholder="Email" class="form-control" readonly value="{{ $user->email }}">
                </div>
            </div>

            <div wire:ignore>
                <div class="form-group">
                    <strong>Rol:</strong>
                    <select class="form-control" name="roles[]">
                      <option selected>Seleccionar rol</option>
                      @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if(in_array($role->id, $userRoles) ) selected @endif> {{ $role->name }} </option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br/>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
