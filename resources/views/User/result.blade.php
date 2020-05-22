@extends('Layout.user-layout')
@section('title')
    Result
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection
@section('container')
    <style>
        body{
            background: #212529;
        }
        .bg-yellow{
            background-color: #f5c72f;
        }
        .table td, .table th {
            border-top: 0px;
        }
        .white-text{
            color: white;
        }
        .loader {
            border: 5px solid #f3f3f3; /* Light grey */
            border-top: 5px solid #555; /* black */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
        .red-font{
            color: darkred;
        }
        p{
            margin-bottom: 0px;
        }
        .card-body{
            padding: .5rem;
        }
        tbody{
            color: white;
        }
        .show{
            display: none;
        }
        .lds-ripple {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-ripple div {
            position: absolute;
            border: 4px solid #fff;
            opacity: 1;
            border-radius: 50%;
            animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
        }
        .lds-ripple div:nth-child(2) {
            animation-delay: -0.5s;
        }
        @keyframes lds-ripple {
            0% {
                top: 36px;
                left: 36px;
                width: 0;
                height: 0;
                opacity: 1;
            }
            100% {
                top: 0px;
                left: 0px;
                width: 72px;
                height: 72px;
                opacity: 0;
            }
        }
        .play-wraper{
            margin-top: 25%;
            min-height: 100vh;
        }
    </style>
    <div class="play-wraper">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="container">
                    <div class="row mt-2 mb-2 bg-yellow">
                        <div class="col-12 pt-1 pb-1 text-center">
                            <strong>RESULTS</strong>
                        </div>
                    </div>
                </div>

                @php
                    $i=0;
                @endphp
                @foreach($matchs as $match)
                    @php
                        $i++;
                    @endphp

                    <div class="card p-0" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 pt-3 text-center bg-white">
                                        <h6><strong>{{$match->game_name}} {{$match->match_code}}</strong></h6>
                                        <p> {{$match->match_date}}  at  {{$match->match_time}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <p class="red-font" style="font-size:14px; font-weight: bold;">Win Prize</p>
                                        <p style="font-size:14px; font-weight: bold;">{{$match->win_prize}}</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="red-font" style="font-size:14px; font-weight: bold;">Per Kill</p>
                                        <p style="font-size:14px; font-weight: bold;">{{$match->per_kill}}</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="red-font" style="font-size:14px; font-weight: bold;">Entry Fee</p>
                                        <p style="font-size:14px; font-weight: bold;">{{$match->entry_fee}}</p>
                                        <p style="margin:0px; font-size: 10px;">(per person)</p>
                                    </div>
                                </div>

                                @if($match->type==1)
                                    @php
                                        $type = 'Solo';
                                    @endphp
                                @elseif($match->type==2)
                                    @php
                                        $type = 'Duo';
                                    @endphp
                                @else
                                    @php
                                        $type = 'Squad';
                                    @endphp
                                @endif
                                <div class="row mt-1">
                                    <div class="col-4 text-center">
                                        <p class="red-font" style="font-size:14px; font-weight: bold;">Type</p>
                                        <p style="font-size:14px; font-weight: bold;">{{$type}}</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="red-font" style="font-size:14px; font-weight: bold;">Version</p>
                                        <p style="font-size:14px; font-weight: bold;">{{$match->version}}</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="red-font" style="font-size:14px; font-weight: bold;">Map</p>
                                        <p style="font-size:14px; font-weight: bold;">{{$match->map}}</p>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 text-center">
                                        <a class="btn btn-resize" style="color:white">Watch</a>
                                        <input type="hidden" id="value{{$i}}" value="{{$match->store_match_id}}">
                                        <a class="btn btn-resize" id="search{{$i}}" style="color:white">Result</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="" id="result{{$i}}">
                            <div class="text-center" id="loader{{$i}}" style="display: none;">
                                <div class="lds-ripple"><div></div><div></div></div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#search{{$i}}').click(function(){
                                $value=$('#value{{$i}}').val();
                                if (($("#result{{$i}}").hasClass(""))){
                                    $("#result{{$i}}").toggleClass('hide');
                                }else{
                                    $("#result{{$i}}").toggleClass('show');
                                }
                                $.ajax({
                                    type : 'get',
                                    url : '{{ route('user.searchResult') }}',
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    data:{'search':$value},
                                    beforeSend: function(){
                                        // Show image container
                                        $("#loader{{$i}}").show();
                                    },
                                    success:function(data){
                                        $('#result{{$i}}').html(data);
                                    },
                                    complete:function(data){
                                        // Hide image container
                                        $("#loader{{$i}}").hide();
                                    }
                                });
                            });
                        });
                    </script>
                @endforeach
            </div>
        </div>
    </div>



@endsection
