@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div>
                <h2 class="pull-left">Administrador de Usuarios</h2>
                <a class="btn btn-success text-right" href="{{ route('users.create') }}"> Crear nuevo usuario</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
             <tr>
               <th>No</th>
               <th>Nombre</th>
               <th>Correo</th>
               <th>Rol</th>
               <th width="280px">Accion</th>
             </tr>
             @foreach ($users as $key => $user)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $role)
                       {{ $role }}
                    @endforeach
                  @endif
                </td>
                <td>
                   <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Ver</a>
                   <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
              </tr>
             @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
