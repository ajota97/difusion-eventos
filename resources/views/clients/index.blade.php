@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestionar Clientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Añadir </a>
            </div>
        </div>
    </div>
<br/>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Nit</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th width="280px">Accion</th>
        </tr>
        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->nit }}</td>
            <td>{{ $client->address }}</td>
            <td>{{ $client->phone }}</td>
            <td>
                   <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Ver</a>
                   <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
