@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2> Ver Usuario</h2>
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Volver</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $user->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Correo:</strong>
                {{ $user->email }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rol:</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $role)
                       <span class="badge bg-dark tips"
                          data-bs-toggle="popover" title="Empty">
                          {{ $role }}
                       </span>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>

@endsection
