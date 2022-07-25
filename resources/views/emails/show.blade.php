@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2> Ver Correo</h2>
            <a class="btn btn-primary" href="{{ route('emails.index') }}"> Volver</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Correo:</strong>
                {{ $email->email }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
                {{ $email->categories->name }}
            </div>
        </div>
    </div>
</div>

@endsection
