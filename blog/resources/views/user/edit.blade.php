@extends('layouts.app');

@section('content')
    <div class="container">

        @if(count($errors) > 0)
            <div class='alert alert-danger'>
                @foreach($errors->all() as $er)
                    <p>{{$er}}</p>
                @endforeach
            </div>
        @endif

        <form method="post" action="{{route('user_management.update', $user->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                       value="{{$user->name}}">
            </div>

            <div class="form-group">
                <label for="name">Role</label>
                <select name="role">
                    @foreach($allRole as $role)
                        <option value="{{$role->id}}"
                            {{$user->role_id == $role->id ? 'selected' : ''}}
                        >{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
