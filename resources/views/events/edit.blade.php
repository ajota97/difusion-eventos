@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actualizar Evento</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('events.index') }}"> Volver</a>
            </div>
        </div>
    </div>

    <form method="post" action="{{ route('events.update', $event->id) }}" >
        @method('put')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $event->name }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha:</strong>
                    <input type="date" name="date" placeholder="Fecha" class="form-control"  value="{{ $event->date }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora Inicio:</strong>
                    <input type="time" name="start_time" placeholder="Hora de inicio" class="form-control" value="{{ $event->start_time }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora Final:</strong>
                    <input type="time" name="finish_time" placeholder="Hora final" class="form-control" value="{{ $event->finish_time }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Direccion:</strong>
                    <input type="text" name="address" placeholder="Direccion" class="form-control" value="{{ $event->address }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <input type="text" name="description" placeholder="Descripcion" class="form-control" value="{{ $event->description }}">
                </div>
            </div>

            <div wire:ignore>
                <div class="form-group">
                    <strong>Categoria:</strong>
                    <select class="form-control" name="category_id">
                      <option selected value={{$event->categories->id}} >{{$event->categories->name}}</option>
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}" > {{ $category->name }}
                         </option>
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
