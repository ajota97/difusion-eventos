@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestionar eventos </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('events.create') }}"> Crear </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <br/>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Direccion</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Cliente</th>
            <th>Creado por</th>
            <th style="text-align: center" width="300px">Accion</th>
        </tr>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->name }}</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->start_time }}</td>
            <td>{{ $event->finish_time }}</td>
            <td>{{ $event->address }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->categories->name }}</td>
            <td>{{ $event->client->name }}</td>
            <td>{{ $event->users->name }}</td>
            <td>
                   <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Ver</a>
                   <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Editar</a>
                   {!! Form::open(['method' => 'POST','route' => ['mails', $event->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Difundir', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                    {!! Form::open(['method' => 'DELETE','route' => ['events.destroy', $event->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection


