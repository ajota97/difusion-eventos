@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="pull-left">Crear nuevo correo</h2>
            <a class="btn btn-primary pull-right" href="{{ route('emails.index') }}"> Volver</a>
        </div>
    </div>
<br/>
    <form id="createForm" method="post" action="{{ route('emails.store') }}" >
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="email" placeholder="Correo" class="form-control">
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
                <button type="submit" class="btn btn-primary" >Aceptar</button>
            </div>
        </div>
    </form>
</div>


@endsection
