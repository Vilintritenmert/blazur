@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('user.view', ['id'=> $user->id])}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{route('user.delete', ['id'=> $user->id])}}" class="btn btn-default" @if (!Auth::user()->hasPermission(['delete_user']) || Auth::user()->id === $user->id) disabled @endif>Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
