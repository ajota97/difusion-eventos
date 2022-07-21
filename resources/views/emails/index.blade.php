@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestionar Correos </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('emails.create') }}"> Add New </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Email</th>
            <th>Category</th>
            <th>User</th>
        </tr>
        @foreach ($emails as $email)
        <tr>
            <td>{{ $email->email }}</td>
            <td>{{ $email->categories->name }}</td>
            <td>{{ $email->users->name }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('emails.show',$email->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('emails.edit',$email->id) }}">Edit</a>
                <form action="{{ route('emails.destroy',$email->id) }}" method="POST">

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection


