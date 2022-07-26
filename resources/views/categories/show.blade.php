@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Ver Categoria</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary text-right" href="{{ route('categories.index') }}"> Volver</a>
            </div>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $categoria->name }}
            </div>
        </div>
    </div>
</div>
@endsection
