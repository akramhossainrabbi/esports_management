@extends('Layout.user-layout')
@section('title')
    Joined player
@endsection
@section('container')
    <style>
        body{
            background-color: #212529;
        }
        .white-text{
            color: white;
        }
        .bg-yellow{
            background-color: #ffbd2a;
        }
        .table{
            color:white;
        }
    </style>
    <div class="play-wraper" style="margin-top: 25%;">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0 bg-dark">
                        @php
                            $compair = '';
                            foreach($player_list as $players){
                               if($players->joined_user_id!=$user->user_id){
                               }else{
                                    $compair = 1;
                               } 
                            }
                        @endphp
                        @if($compair!=1)
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h6 class="mt-3 mb-3" style="color: orangered; font-weight: bold;">Room Username Password will be here before five minutes of the match. Join to get it.</h6>
                                </div>
                            </div>
                        @else
                            @if($room_password)
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <h6 class="white-text mt-2">Room Username</h6>
                                        <p style="color: goldenrod">{{$room_password->room_username}}</p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h6 class="white-text mt-2">Room Password</h6>
                                        <p style="color: goldenrod">{{$room_password->room_password}}</p>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h6 class="mt-3 mb-3" style="color: orangered; font-weight: bold;">Room Username Password will be here before five minutes of the match. Refresh to see.</h6>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                 <div class="row mt-3">
                     <div class="col-12 p-0 bg-yellow text-center">
                         <h6 class="white-text mb-2 mt-1">Player joined on this match</h6>
                     </div>
                 </div>
                <div class="row mt-2">
                    <div class="col-12 p-0 mt-2">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @if($match->type==1)
                                    @foreach($player_list as $player)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <th scope="row" width="10%">{{$i}}</th>
                                            <td>{{$player->game_user_name_one}}</td>
                                        </tr>
                                    @endforeach
                                @elseif($match->type==2)
                                    @foreach($player_list as $player)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>team{{$i}}</td>
                                            <td>{{$player->game_user_name_one}}</td>
                                            <td>{{$player->game_user_name_two}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach($player_list as $player)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>team{{$i}}</td>
                                            <td>{{$player->game_user_name_one}}</td>
                                            <td>{{$player->game_user_name_two}}</td>
                                            <td>{{$player->game_user_name_three}}</td>
                                            <td>{{$player->game_user_name_four}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
