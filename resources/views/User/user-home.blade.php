@extends('Layout.user-layout')
@section('title')
    Home
@endsection
@section('container')
<style>
    body{
        background-color: #212529;
    }

    .container {
      position: relative;
    }

    .image {
      opacity: .4;
      display: block;
      width: 100%;
      height: auto;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .middle {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }
    .text{
      color: white;
    }
    .btn-get-started {
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 16px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 8px 32px;
        border-radius: 50px;
        transition: 1.5s;
        margin: 10px;
        color: #fff;
        background-size: 100% 200%;
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, .0) 50%, #00f7ba 50%);
        border: 1px solid;
        -webkit-transition: background-position .4s;
        -moz-transition: background-position .4s;
        transition: background-position .4s;
    }
</style>
    <div class="play-wraper" style="margin-top: 18%">



        @foreach($Games as $game)
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 20px; margin-bottom: 20px;">
                  <div class="container">
                    <img src="{{asset('images/games')}}/{{$game->game_image}}" alt="Under constraction" class="image">
                    <div class="middle">
                      <h4 class="text">{{ $game->game_name }}</h4>
                      <a href="{{route('user.homeView', [$game->game_id])}}" class="btn-get-started">Matchs</a>
                    </div>
                  </div>
                </div>
             </div>
        @endforeach
    </div>
@endsection
