@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestionar Categorias</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Añadir </a>
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
            <th>Id</th>
            <th>Nombre</th>
            <th width="280px">Accion</th>
        </tr>
        @foreach ($categories as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->name }}</td>
            <td>
                   <a class="btn btn-info" href="{{ route('categories.show',$categoria->id) }}">Ver</a>
                   <a class="btn btn-primary" href="{{ route('categories.edit',$categoria->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $categoria->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
