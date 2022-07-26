@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestionar Correos </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('emails.create') }}"> Crear</a>
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
            <th>Correo</th>
            <th>Categoria</th>
            <th>Creado por</th>
            <th>Acciones</th>
        </tr>
        @foreach ($emails as $email)
        <tr>
            <td>{{ $email->email }}</td>
            <td>{{ $email->categories->name }}</td>
            <td>{{ $email->users->name }}</td>
            <td>
            <a class="btn btn-info" href="{{ route('emails.show',$email->id) }}">Ver</a>
                   <a class="btn btn-primary" href="{{ route('emails.edit',$email->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['emails.destroy', $email->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection


