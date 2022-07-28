@extends('layouts.app')
@section('content')
<div class="container mt-1">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="pull-left">Crear nuevo correo</h2>
            <div>
                <a class="btn btn-primary pull-right" href="{{ route('emails.index') }}"> Volver</a>
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

    <form action="{{ route('emails.store') }}" id="createForm" method="POST">
        @csrf
        <div class="row">
        <div class="p-5 bg-white rounded shadow-lg">
                <div class="form-group mb-2">
                    <strong>Correo:</strong>
                    <input type="text" name="email" 
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Correo" value="{{ old('email') }}">
                
                    @error('name')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                </div>
         
                <div class="form-group mb-2">
                    <strong>Categoria:</strong>
                    <select class="form-control" name="category_id" >
                      <!-- <option selected>Seleccionar categoria</option> -->
                      @foreach($categories as $categoria)
                        <option value="{{ $categoria->id }}"> {{ $categoria->name }} </option>
                      @endforeach
                    </select>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br/>
                <button type="submit" class="btn btn-primary" >Aceptar</button>
            </div>
        </div>
    </form>
</div>


@endsection
