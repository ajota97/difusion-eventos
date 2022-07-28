@extends('layouts.app')
@section('content')
<div class="container mt-1">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="pull-left">Crear nuevo Evento</h2>
            <a class="btn btn-primary pull-right" href="{{ route('events.index') }}"> Volver</a>
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

    <form action="{{ route('events.store') }}" method="post" >
        @csrf
        <div class="row">
        <div class="p-5 bg-white rounded shadow-lg">
                <div class="form-group mb-2">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" 
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nombre" value="{{ old('date') }}">

                    @error('name')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <strong>Fecha:</strong>
                    <input type="date" name="date"
                           class="form-control @error('date') is-invalid @enderror"
                            placeholder="Fecha" value="{{ old('date') }}">
                    @error('date')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <strong>Hora Inicio:</strong>
                    <input type="time" name="start_time"
                            class="form-control @error('start_time') is-invalid @enderror"
                            placeholder="Hora de inicio"  value="{{ old('start_time') }}">
                    @error('start_time')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
            

         
                <div class="form-group mb-2">
                    <strong>Hora Final:</strong>
                    <input type="time" name="finish_time"
                            class="form-control @error('finish_time') is-invalid @enderror"
                            placeholder="Hora final" value="{{ old('finish_time') }}">
                    @error('finish_time')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <strong>Direccion:</strong>
                    <input type="text" name="address"
                            class="form-control @error('address') is-invalid @enderror"
                            placeholder="Direccion" value="{{ old('address') }}">
                    @error('address')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                       
                <div class="form-group mb-2">
                    <strong>Descripcion:</strong>
                    <input type="text" name="description"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Descripcion" value="{{ old('description') }}">
                    @error('description')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
                        
                <div class="form-group mb-2">
                    <strong>Cliente:</strong>
                    <select class="form-control" name="clients[]" >
                      <!-- <option selected>Seleccionar cliente</option> -->
                      @foreach($clients as $client)
                        <option value="{{ $client->id }}"> {{ $client->name }} </option>
                      @endforeach
                    </select>
                </div>
            

          
                <div class="form-group mb-2">
                    <strong>Categoria:</strong>
                    <select class="form-control" name="categories[]" >
                      <!-- <option selected>Seleccionar categoria</option> -->
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
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
