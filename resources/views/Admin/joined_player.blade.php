@extends('Layout.admin-layout')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/style.css">
@endsection
@section('title')
    Players
@endsection
@section('container')
    <style>
        .form-control:focus {
            box-shadow: none;
        }


        body {
            background: #ffd89b;
            background: -webkit-linear-gradient(to right, #ffd89b, #19547b);
            background: linear-gradient(to right, #ffd89b, #19547b);
            min-height: 100vh;
        }

        .form-control::placeholder {
            font-size: 0.95rem;
            color: #aaa;
            font-style: italic;
        }
        .play-wraper{
            margin-top: 20%;
        }
    </style>
    <div class="play-wraper">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                <form action="/esport.admin.login.panel/match-players" method="get">
                    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                        <div class="input-group">
                            <input type="search" name="match_code" placeholder="Search by the match code" aria-describedby="button-addon1" class="form-control border-0 bg-light" style="border-radius: 20px;">
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
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congrats !</strong> {{session('message')}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-light">
                        <thead class="thead-dark border-0">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Player One</th>
                            <th scope="col">Player Two</th>
                            <th scope="col">Player Three</th>
                            <th scope="col">Player Four</th>
                            <th scope="col">Match Code</th>
                            @if($joined_player)
                                <th scope="col">
                                    @if($match)
                                        <a data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-address-card"></i></a>
                                    @endif
                                </th>
                                <!-- Modal -->
                                <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center bg-dark">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Room Username and Password</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/esport.admin.login.panel/match-players" method="POST">
                                                    @csrf
                                                    <input type="text" name="username" placeholder="Room Username" required>
                                                    <input type="text" name="password" placeholder="Room Password" required>
                                                    @if($match)
                                                        <input type="hidden" name="match_id" value="{{$match->match_id}}" required>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <button type="button" class="btn btn-secondary btn-resize" style="font-size: 15px;" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary btn-resize" style="font-size: 15px;">Give</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0;
                        @endphp
                        @if($joined_player)
                            @foreach($joined_player as $player)
                                @if($player->user_first_name)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$player->game_user_name_one}}</td>
                                        <td>{{$player->game_user_name_two}}</td>
                                        <td>{{$player->game_user_name_three}}</td>
                                        <td>{{$player->game_user_name_four}}</td>
                                        <td>{{$player->match_code}}</td>
                                        <td><a href="{{route('admin.addKillView', [$player->joined_user_id])}}"><i class="fab fa-bitcoin"></i></a></td>
                                    </tr>
                                @else
                                    <div class="text-center">
                                        <h6 class="red-font">No Data Available</h6>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="text-center">
                                <h6 class="red-font">There is no match by this name</h6>
                            </div>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
