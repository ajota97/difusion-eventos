@extends('layouts.app')
@section('content')
<div class="container mt-1">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Usuario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Volver</a>
            </div>
        </div>
    </div>
    <br/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{ route('users.update', $user->id) }}" method="post" >
        @csrf
        @method('put')
        <div class="row">
            <div class="p-5 bg-white rounded shadow-lg">
                <div class="form-group mb-2">
                    <strong>Nombre:</strong>
                    <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Name"  value="{{ $user->name }}">
                    @error('name')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror    
                </div>
                <div class="form-group mb-2">
                    <strong>Correo:</strong>
                    <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ $user->email }}">
                    @error('email')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                     
                </div>
          

            <div wire:ignore>
                <div class="form-group mb-2">
                    <strong>Rol:</strong>
                    <select class="form-control" name="roles[]">
                      <!-- <option selected>Seleccionar rol</option> -->
                      @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if(in_array($role->id, $userRoles) ) selected @endif> {{ $role->name }} </option>
                      @endforeach
                    </select>
                </div>
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
