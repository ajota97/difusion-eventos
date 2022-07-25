@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="pull-left">Crear Evento</h2>
            <a class="btn btn-primary pull-right" href="{{ route('events.index') }}"> Volver</a>
        </div>
    </div>
<br/>
    <form method="post" action="{{ route('events.store') }}" >
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" placeholder="Nombre" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha:</strong>
                    <input type="date" name="date" placeholder="Fecha" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora Inicio:</strong>
                    <input type="time" name="start_time" placeholder="Hora de inicio" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora Final:</strong>
                    <input type="time" name="finish_time" placeholder="Hora final" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Direccion:</strong>
                    <input type="text" name="address" placeholder="Direccion" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <input type="text" name="description" placeholder="Descripcion" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cliente:</strong>
                    <select class="form-control" name="clients[]" >
                      <option selected>Seleccionar cliente</option>
                      @foreach($clients as $client)
                        <option value="{{ $client->id }}"> {{ $client->name }} </option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categoria:</strong>
                    <select class="form-control" name="categories[]" >
                      <option selected>Seleccionar categoria</option>
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
