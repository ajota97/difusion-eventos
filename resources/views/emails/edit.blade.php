@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actualizar Correo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('emails.index') }}"> Volver</a>
            </div>
        </div>
    </div>

    <form method="post" action="{{ route('emails.update', $email->id) }}" >
        @method('put')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="email" placeholder="Correo" class="form-control" value="{{ $email->email }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categoria:</strong>
                    <select class="form-control" name="categories[]" >
                      <option selected>Seleccionar categoria</option>
                      @foreach($categories as $categoria)
                        <option value="{{ $categoria->id }}"> {{ $categoria->name }} </option>
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
