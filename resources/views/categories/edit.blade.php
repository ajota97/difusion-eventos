@extends('layouts.app')
@section('content')
<div class="container mt-1">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Categoria</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Volver</a>
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

    <form action="{{ route('categories.update', $categoria->id) }}" method="POST">
        @csrf

        @method('PUT')
         <div class="row">
            <div class="p-5 bg-white rounded shadow-lg">
                <div class="form-group mb-2">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" 
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nombre" value="{{ $categoria->name }}" >

                    @error('name')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
                    
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
