@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">{{$user->name}}</div>
            <div class="panel-body">
            <form action="{{route('user.update')}}" method="post">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Email address:</label>
                        <input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}">
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}">
                    </div>
                    <button type="submit" class="btn btn-default" @if (!Auth::user()->hasPermission(['update_user'])) disabled @endif >Submit</button>
                </form>
        </div>
        </div>
    </div>

    <div class="col-md-8">
        <table class="table table-stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>Created At</th>
                <th>Name</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
        @foreach($actions as $action)
            <tr>
                <td> {{$action->id }} </td>
                <td> {{$action->created_at }}</td>
                <td> {{$action->name }} </td>
                <td> {{$action->result }} </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
