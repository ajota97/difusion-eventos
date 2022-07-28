@extends('layouts.app')
@section('content')
<div class="container mt-1">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Cliente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Volver</a>
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

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf

        @method('PUT')
        <div class="row">
         <div class="p-5 bg-white rounded shadow-lg">
                <div class="form-group mb-2">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" 
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nombre" value="{{ $client->name  }}">

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
                         placeholder="Correo" value="{{ $client->email }}">
                  @error('email')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                  <strong>Nit:</strong>
                  <input type="text" name="nit" 
                         class="form-control @error('nit') is-invalid @enderror"
                         placeholder="Nit" value="{{ $client->nit }}">
                  @error('nit')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>           
                <div class="form-group mb-2">
                  <strong>Direccion:</strong>
                  <input type="text" name="address" 
                  class="form-control @error('address') is-invalid @enderror" 
                  placeholder="Direccion" value="{{ $client->address }}">
                  @error('address')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                  <strong>Telefono:</strong>
                  <input type="text" name="phone"   
                         class="form-control @error('phone') is-invalid @enderror" 
                         placeholder="Telefono" value="{{ $client->phone }}">
                  @error('phone')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </form>
</div>
@endsection
