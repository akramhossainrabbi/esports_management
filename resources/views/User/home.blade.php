@extends('Layout.user-layout')
@section('title')
    Matches
@endsection
@section('container')
    <style>
        body{
            background-color: #212529;
        }
        .btn-primary{
            padding: 3px 20px;
            background-color: #608fc2;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }
        .card .card-header{
            border-radius: 10px;
        }
        .card{
            border: 0px;
            border-radius: 12px;
        }
        .card-header{
            padding: 0.5rem 1.25rem;
        }
        .btn-resize{
            padding: 5px 20px;
            font-size: 14px;
            font-weight: bold;
            width: 30%;
            background-color: #00f7ba;
            border-color: #00f7ba;
        }
        .btn-resize:hover{
            background-color: #3affce;
            border-color: #3affce
        }
        .btn-resize_lobby{
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 18px;
            padding-right: 20px;
            font-size: 14px;
            font-weight: bold;
            width: 30%;
            background-color: #00f7ba;
            border-color: #00f7ba;
        }
        .btn-resize_lobby:hover{
            background-color: #3affce;
            border-color: #3affce
        }
        p{
            margin-bottom: 0px;
        }
        .play-wraper{
            margin-top: 28%;
            min-height: 100vh;
        }
    </style>
    <div class="play-wraper">
        @foreach($datas as $data)
            @if(!$data->win_prize)
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <h2 style="color: red">Oops! Sorry. No Match Available.</h2>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card" style="margin-bottom: 20px;">
                            <div class="card-header" style="background-color: #343a40;">
                                <div class="text-center">
                                    <h4 style="color: white;">{{$data->game_name}} {{$data->match_code}}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <p class="red-font" style="font-size:14px; font-weight: bold;">Win Prize</p>
                                            <p style="font-size:14px; font-weight: bold;">{{$data->win_prize}}</p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <p class="red-font" style="font-size:14px; font-weight: bold;">Per Kill</p>
                                            <p style="font-size:14px; font-weight: bold;">{{$data->per_kill}}</p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <p class="red-font" style="font-size:14px; font-weight: bold;">Entry Fee</p>
                                            <p style="font-size:14px; font-weight: bold;">{{$data->entry_fee}}</p>
                                            <p style="margin:0px; font-size: 10px;">(per person)</p>
                                        </div>
                                    </div>
                                    @php
                                        if($data->type==1){
                                            $type = 'Solo';
                                        }elseif($data->type==2){
                                            $type = 'Duo';
                                        }else{
                                             $type = 'Squad';
                                        }
                                    @endphp
                                    <div class="row mt-1">
                                        <div class="col-4 text-center">
                                            <p class="red-font" style="font-size:14px; font-weight: bold;">Type</p>
                                            <p style="font-size:14px; font-weight: bold;">{{$type}}</p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <p class="red-font" style="font-size:14px; font-weight: bold;">Version</p>
                                            <p style="font-size:14px; font-weight: bold;">{{$data->version}}</p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <p class="red-font" style="font-size:14px; font-weight: bold;">Map</p>
                                            <p style="font-size:14px; font-weight: bold;">{{$data->map}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center red-font">
                                            {{$data->match_date}} at {{$data->match_start}}
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-12 text-center">
                                            <a href="{{route('user.waitView', [$data->match_id])}}" class="btn btn-resize_lobby" style="color: white;">LOBBY</a>
                                            <a class="btn btn-resize" data-toggle="modal" data-target="#exampleModalLong" style="color: white;">JOIN</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

     <!-- Modal -->
    <div class="modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 p-0">
                                <p style="font-weight: bold; font-size: 18px">Read the Rulls carefully <i class="fas fa-hand-point-down" style="color: #ffb61e"></i></p>
                                <p style="margin-bottom: 10px;">1. Player who have started playing from Season 9 are not allowed to participate in play for money Matches.</p>
                                <p style="margin-bottom: 10px;">2. PUBG Accounts with EXP Level less than 40 are not allowed to participate. Such participants will be kicked from the room and they will not be given refund.</p>
                                <p style="margin-bottom: 10px;">3. If in anyway you fail to join the room by the match start time then we aren't responsible for it. Refund in such cases won't be processed. So make sure to join on time.</p>
                                <p style="margin-bottom: 10px;">4. Do not share the Room ID & Password with anyone who has not joined the match. If you are doing so, your account may get terminated and all the winnings will be lost.</p>
                                <p style="margin-bottom: 10px;">5. Griefing and Teaming is against the game rules. Any participant found doing so will be disqualified and their will be lost.</p>
                                <p style="margin-bottom: 10px;">6. Room ID and Password will be shared in the app before 15 minutes of match start time. Match will start after 15 minutes of Sharing Room ID and Password. Make sure to grab ID and Password before the Match Start time.Make sure you join the Match Room ASAP, before the match starts.</p>
                                <p style="margin-bottom: 10px;">7. This match is Paid match. To participate, you have to pay the entry fee amount, There are total 100 spots available. Join it before all the spots are filled.</p>
                                <p style="margin-bottom: 10px;">8. Please note that the listed entry fee is per individual and not the squad/duo team. Each member of a team(Squad or Duo)has to pay the entry fee and register individually for the match or tournament.</p>
                                <p style="margin-bottom: 10px;">9. Once you join the match custom room, do not keep changing your position. If you do so, you may get kicked from the room. Spots are given on the First Come First Basis.</p>
                                <p style="margin-bottom: 10px;">10 .Last standing man gets the Chicken Dinner Award. You will be also rewarded for each kill. Check the rewards details above.</p>
                                <p style="margin-bottom: 10px;">11 .Use only Mobile Device to Join Mobile Match. Do not use any Hacks or Emulators. If the match is created for Emulator players then Emulator and Mobile both can Join if they wish.</p>
                                <p style="margin-top: 10px;"><strong>If anyone found violating these rules then immedi- ate action will be taken and respective accounts may get banned and rewards may be abandoned.</strong></p>
                                
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center p-0">
                                <a href="{{route('user.joinView', [$data->match_id])}}" style="color: white;" class="btn btn-primary btn-block">I Accept</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
