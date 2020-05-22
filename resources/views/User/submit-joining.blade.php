@extends('Layout.user-layout')
{{-- @section('css')
    <link href="{{asset('css')}}/other.css" rel="stylesheet">
@endsection --}}
@section('title')
    Join Here
@endsection
@section('container')
<style>
    body{
            background-color: #212529;
        }
    .play-wraper{
            margin-top: 20%;
</style>
        <div class="play-wraper">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @if(session('message4'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="row">
                                <div class="col-3">
                                    <i class="far fa-angry fa-3x"></i>
                                </div>
                                <div class="col-7">
                                    {{session('message4')}}<strong> You already joined in a match. Play that first.</strong>
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> 
                            </div>
                        </div>
                    @endif
                    @if(session('message3'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops !</strong> {{session('message3')}}. <strong><a href="{{route('user.transactionView')}}">Click here to add money to your account.</a></strong>
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
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congrats !</strong> {{session('message')}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($Match->type==1)
                        <div class="card mb-5">
                            <div class="card-header" style="background-color: #00f7ba;">
                                <div class="text-center">
                                    <h2 style="color: white;">JOIN</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST" action="/join/match/{id}" class="appointment-form" id="appointment-form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group-1">
                                                    <h5 style="color: red">Add {{$datas->game_name}} User Name</h5>
                                                    <input type="text" class="form-control" name="game_user_name_one" id="game_user_name_one" placeholder="Username" required />
                                                </div>
                                                <p class="text-center red-font">Make sure you enter real {{$datas->game_name}} username</p>
                                                <div class="form-submit mt-2">
                                                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Join" />
                                                </div>
                                                <input type="hidden" name="match_id" value="{{$Match->match_id}}">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($Match->type==2)
                        <div class="card mb-5">
                            <div class="card-header" style="background-color: #00f7ba;">
                                <div class="text-center">
                                    <h2 style="color: white;">JOIN</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST" action="/join/match/{id}" class="appointment-form" id="appointment-form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group-1">
                                                    <h5 style="color: red">Add {{$datas->game_name}} User Name</h5>
                                                    <input type="text" class="form-control" name="game_user_name_one" id="game_user_name_one" placeholder="Player one Username" required />
                                                    <input type="text" class="form-control mt-3" name="game_user_name_two" id="game_user_name_two" placeholder="Player two Username" required />
                                                </div>
                                                <p class="text-center red-font">Make sure you enter real {{$datas->game_name}} username</p>
                                                <div class="form-submit mt-2">
                                                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Join" />
                                                </div>
                                                <input type="hidden" name="match_id" value="{{$Match->match_id}}">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($Match->type==3)
                        <div class="card mb-5">
                            <div class="card-header" style="background-color: #00f7ba;">
                                <div class="text-center">
                                    <h2 style="color: white;">JOIN</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <form method="POST" action="/join/match/{id}" class="appointment-form" id="appointment-form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group-1">
                                                    <h5 style="color: red">Add {{$datas->game_name}} User Name</h5>
                                                    <input type="text" class="form-control" name="game_user_name_one" id="game_user_name_one" placeholder="Player one Username" required />
                                                    <input type="text" class="form-control mt-3" name="game_user_name_two" id="game_user_name_two" placeholder="Player two Username" required />
                                                    <input type="text" class="form-control mt-3" name="game_user_name_three" id="game_user_name_three" placeholder="Player three Username" required />
                                                    <input type="text" class="form-control mt-3" name="game_user_name_four" id="game_user_name_four" placeholder="Player four Username" />
                                                </div>
                                                <p class="text-center red-font">Make sure you enter real {{$datas->game_name}} username</p>
                                                <div class="form-submit mt-2">
                                                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Join" />
                                                </div>
                                                <input type="hidden" name="match_id" value="{{$Match->match_id}}">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
@endsection
