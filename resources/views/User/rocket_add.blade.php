@extends('Layout.user-layout')
@section('title')
    Rocket
@endsection
@section('container')
    <style>
        html body{
            background: black;
            min-height: 100% !important;
            height: 100%;
        }
        .play-wraper{
            margin-top: 23%;
        }
    </style>
    <div class="play-wraper">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5 bg-white">
                <div class="row">
                    <div class="col-12 bg-dark" style="padding-top: 10px; padding-bottom: 10px;">
                        <a href="{{route('user.profileView')}}" class="float-left" style="color: white"><i class="fa fa-arrow-left fa-2x"></i></a>
                        <h5 class="mt-1" style="color: white; text-align: center;">Add Money Section</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <img src="{{asset('images')}}/icons/ROCKET.png" alt="" style="max-height: 35px; max-width: 35px;">
                        <span style="margin-left: 3px; font-size: 14px">0190000000000 (Play for Money Rocket Number)</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <p style="color: red; font-size: 14px;">*First send money to Play for Money Rocket personal number and verify your payment by entering your mobile number and amount you send.</p>
                    </div>
                </div>
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congrats !</strong> {{session('message')}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row mt-10">
                    <div class="col-12">
                        <form action="/transaction/rocket" method="post">
                            @csrf
                            <input type="number" class="form-control" name="amount_to_add" placeholder="How much you send?">
                            <input type="number" class="form-control mt-3 mb-3" name="rocket" placeholder="From which number?">
                            <button type="submit" class="btn btn-primary btn-block">Verify Payment</button>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p style="color: darkred; font-size: 14px;">*Make sure you have send money before verify payment. Otherwise your request will be terminated.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
