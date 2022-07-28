@extends('layouts.app')
@section('content')
<div class="container mt-1">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="pull-left">Crear nuevo usuario</h2>
            <a class="btn btn-primary pull-right" href="{{ route('users.index') }}"> Volver</a>
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

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="row">
        <div class="p-5 bg-white rounded shadow-lg">
                <div class="form-group mb-2">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" 
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nombre"  value="{{ old('name') }}">
                       
                    @error('name')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <strong>Correo:</strong>
                    <input type="text" name="email" 
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Correo" value="{{ old('email') }}">
                
                    @error('email')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div> 
                <div class="form-group mb-2">
                    <strong>Contraseña:</strong>
                    <input type="password" name="password" 
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Contraseña"  value="{{ old('password') }}">
                    
                    @error('password')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <strong>Confirmar contraseña:</strong>
                    <input type="password" name="password_confirmation" 
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirmar contraseña" value="{{ old('password_confirmation') }}">
                
                    @error('password_confirmation')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <strong>Role:</strong>
                    <select class="form-control" name="roles[]" >
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
