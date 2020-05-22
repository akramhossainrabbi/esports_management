@extends('Layout.admin-layout')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/searchbar.css">
@endsection
@section('title')
    Users
@endsection
@section('container')
    <div class="play-wraper">
        <div class="row">
            <div class="col-12 p-0">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congrats !</strong> {{session('message')}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(session('message2'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops !</strong> {{session('message2')}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                <form action="/esport.admin.login.panel/users" method="get">
                    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                        <div class="input-group">
                            <input type="search" name="user_username" placeholder="Search by the username" aria-describedby="button-addon1" class="form-control border-0 bg-light" style="border-radius: 20px;">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12 p-0 mt-2">
                <div class="table-responsive">
                    @if($searched_user)
                        <table class="table table-light text-center">
                            <thead class="thead-dark border-0">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Player Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Add Balance</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($searched_user)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$searched_user->user_first_name}} {{$searched_user->user_last_name}}</td>
                                    <td>{{$searched_user->user_username}}</td>
                                    <td><a data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-money"></i></a></td>
                                    <td><a href="" style="color: red"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            @else
                                <div class="text-center">
                                    <h6 class="red-font">No Data Available</h6>
                                </div>
                            @endif
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center bg-dark">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Enter Amount</h5>
                </div>
                <div class="modal-body">
                    <form action="/esport.admin.login.panel/users" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="amount" placeholder="Amount" required>
                        <input type="password" class="form-control mt-3 mb-3" name="password" placeholder="Confirm your Password" required>
                        @if($searched_user)
                            <input type="hidden" name="user_id" value="{{$searched_user->user_id}}">
                        @endif
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-secondary btn-resize" style="font-size: 15px;" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-resize" style="font-size: 15px;">Add Balance</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
