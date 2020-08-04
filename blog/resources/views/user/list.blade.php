@extends('layouts.app')

@section('content')
    <script type="text/javascript" src="{{ URL::asset('js/user.js') }}"></script>
    <div class="container">
        <h1>User Manager</h1>
        <div class="flash-message">
            <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>

        <div class="row mt-5" style="margin-top:20px;">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr style="background-color:rgb(215, 243, 227)">
                        <th class="text-center">No.</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lsUser as $user)
                        <tr class="text-center">
                            <td>{{$user->id}}</td>
                            <td class="name">{{$user->name}}</td>
                            <td class="role">{{$user->role->name}}</td>
                            <td>
                                <a id="{{$user->id}}" onclick="loadUserDetail($(this))"><i
                                        class="fa fa-folder-open-o text-success"></i></a>
                                <a href="{{route('user_management.edit', $user->id)}}" <i
                                    class="fa fa-pencil-square-o text-success"></i></a>
                                <a onclick="delUser('{{$user->id}}')"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="userDetail" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">User Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-5">
                                    <label class="text-dark">Name:</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="txt-name" class="form-control"/>
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-5">
                                    <label class="text-dark">Role:</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="txt-role" class="form-control"
                                           value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
