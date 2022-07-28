@extends('layouts.app')
@section('content')
<div class="container mt-1">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Correo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('emails.index') }}"> Volver</a>
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

    <form action="{{ route('emails.update', $email->id) }}" method="post" >
        @csrf
        @method('put')
        <div class="row">
            <div class="p-5 bg-white rounded shadow-lg">
                <div class="form-group mb-2">
                    <strong>Correo:</strong>
                    <input type="text" name="email" 
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Correo" value="{{ $email->email }}">
               
                    @error('email')
                    <span class="invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                    @enderror
               
                </div>

            <div wire:ignore>
                <div class="form-group mb-2">
                    <strong>Categoria:</strong>
                    <select class="form-control" name="category_id" >
                      <option selected value={{$email->categories->id}}>{{$email->categories->name}}</option>
                      @foreach($categories as $categoria)
                        <option value="{{ $categoria->id }}"> {{ $categoria->name }} </option>
                      @endforeach
                    </select>
                </div>
            </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <br/>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
