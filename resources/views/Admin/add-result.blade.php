@extends('Layout.admin-layout')
@section('title')
    Result
@endsection
@section('container')
<style>
    .play-wraper{
        margin-top: 20%;
    }
</style>
    <div class="play-wraper">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congrats !</strong> {{session('message')}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header" style="background-color: darkred;">
                        <div class="text-center">
                            <h2 style="color: white;">{{$player_resut->user_first_name}} {{$player_resut->user_last_name}}</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    @if($match->type==1)
                                        <form method="POST" action="/esport.admin.login.panel/match-players/{id}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group-1">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h6>{{$player_resut->game_user_name}}</h6>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="custom">Winner
                                                            <input type="checkbox" name="winner" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="name" value="{{$player_resut->user_first_name}} {{$player_resut->user_last_name}}">
                                                <label for="player_one">{{$player_resut->game_user_name_one}} Kills</label>
                                                <input type="number" class="form-control mb-2" name="player_one" id="player_one" placeholder="Kills" required>
                                                <input type="hidden" name="match_id" value="{{$player_resut->match_id}}">
                                                <input type="hidden" name="match_game_id" value="{{$player_resut->game_user_game_id}}" required>
                                                <input type="hidden" name="joined_user_id" value="{{$player_resut->user_id}}">
                                                <input type="hidden" name="users_joined_in_match_id" value="{{$player_resut->users_joined_in_match_id}}">
                                                <input type="hidden" name="player_one_username" value="{{$player_resut->game_user_name_one}}">
                                                @php
                                                    $url = \Illuminate\Support\Facades\URL::previous();
                                                @endphp
                                                <input type="hidden" name="url" value="{{$url}}">
                                            </div>
                                            <div class="form-submit mt-2">
                                                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Save" />
                                            </div>
                                        </form>
                                    @elseif($match->type==2)
                                        <form method="POST" action="/esport.admin.login.panel/match-players/{id}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group-1">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h6>{{$player_resut->game_user_name}}</h6>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="custom">Winner
                                                            <input type="checkbox" class="form-control" name="winner" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="name" value="{{$player_resut->user_first_name}} {{$player_resut->user_last_name}}">
                                                <label for="player_one">{{$player_resut->game_user_name_one}} Kills</label>
                                                <input type="number" class="form-control mt-2" name="player_one" id="player_one" placeholder="Kills" required>
                                                <label for="player_two">{{$player_resut->game_user_name_two}} Kills</label>
                                                <input type="number" class="form-control mt-2 mb-2" name="player_two" id="player_two" placeholder="Kills" required>
                                                <input type="hidden" name="match_id" value="{{$player_resut->match_id}}">
                                                <input type="hidden" name="match_game_id" value="{{$player_resut->game_user_game_id}}" required>
                                                <input type="hidden" name="joined_user_id" value="{{$player_resut->user_id}}">
                                                <input type="hidden" name="users_joined_in_match_id" value="{{$player_resut->users_joined_in_match_id}}">
                                                <input type="hidden" name="player_one_username" value="{{$player_resut->game_user_name_one}}">
                                                <input type="hidden" name="player_two_username" value="{{$player_resut->game_user_name_two}}">
                                                @php
                                                    $url = \Illuminate\Support\Facades\URL::previous();
                                                @endphp
                                                <input type="hidden" name="url" value="{{$url}}">
                                            </div>
                                            <div class="form-submit mt-2">
                                                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Save" />
                                            </div>
                                        </form>
                                    @else
                                        <form method="POST" action="/esport.admin.login.panel/match-players/{id}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group-1">
                                                <div class="row">
                                                    <div class="col-8">
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="custom">Winner
                                                            <input type="checkbox" class="form-control" name="winner" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="name" value="{{$player_resut->user_first_name}} {{$player_resut->user_last_name}}">
                                                <label for="player_one">{{$player_resut->game_user_name_one}} Kills</label>
                                                <input type="number" class="form-control mt-2" name="player_one" id="player_one" placeholder="Kills" required>
                                                <label for="player_two">{{$player_resut->game_user_name_two}} Kills</label>
                                                <input type="number" class="form-control mt-2" name="player_two" id="player_two" placeholder="Kills" required>
                                                <label for="player_three">{{$player_resut->game_user_name_three}} Kills</label>
                                                <input type="number" class="form-control mt-2" name="player_three" id="player_three" placeholder="Kills" required>
                                                <label for="player_four">{{$player_resut->game_user_name_four}} Kills</label>
                                                <input type="number" class="form-control mt-2 mb-2" name="player_four" id="player_four" placeholder="Kills" required>
                                                <input type="hidden" name="match_id" value="{{$player_resut->match_id}}">
                                                <input type="hidden" name="match_game_id" value="{{$player_resut->game_user_game_id}}" required>
                                                <input type="hidden" name="joined_user_id" value="{{$player_resut->user_id}}">
                                                <input type="hidden" name="users_joined_in_match_id" value="{{$player_resut->users_joined_in_match_id}}">
                                                <input type="hidden" name="player_one_username" value="{{$player_resut->game_user_name_one}}">
                                                <input type="hidden" name="player_two_username" value="{{$player_resut->game_user_name_two}}">
                                                <input type="hidden" name="player_three_username" value="{{$player_resut->game_user_name_three}}">
                                                <input type="hidden" name="player_four_username" value="{{$player_resut->game_user_name_four}}">
                                                @php
                                                    $url = \Illuminate\Support\Facades\URL::previous();
                                                @endphp
                                                <input type="hidden" name="url" value="{{$url}}">
                                            </div>
                                            <div class="form-submit mt-2">
                                                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Save" />
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
