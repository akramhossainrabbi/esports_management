@extends('Layout.user-layout')
@section('title')
    Withdraw
@endsection
@section('container')
    <style>
        body {
            background: #212529;
            min-height: 100vh;
        }
        .card{
           box-shadow: 1px 2px 3px 1px rgba(109, 109, 142, 0.22);
        }
        a:hover {
            text-decoration: none;
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
                        <h5 class="mt-1" style="color: white; text-align: center;">Money withdraw Section</h5>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12">
                        <div class="text-center">
                            <h5 style="font-weight: bold;">Withdrow to <span style="color: #ff4648">bKash</span> or <span style="color: purple">Rocket</span> Account</h5>
                        </div>
                        <div class="container">
                            <div class="row mt-10">
                                <div class="col-12 text-center">
                                    @if(session('message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Congrats !</strong> {{session('message')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if(session('message2'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{session('message2')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <form action="/transaction" method="post">
                                        @csrf
                                        <select name="withdow_method" class="form-control mb-3" required>
                                            <option value="">--Select Payment Method--</option>
                                            <option value="bkash">bKash</option>
                                            <option value="rocket">Rocket</option>
                                        </select>
                                        <input type="number" class="form-control" name="mobile_number" placeholder="Mobile Number" required>
                                        <input type="number" class="form-control mt-3 mb-3" name="amount_withdraw" placeholder="Amount to Withdraw" min="100" required>
                                        <p>Minimum withdraw amount is BDT 100</p>
                                        <button type="submit" class="btn btn-primary btn-block mb-4">Withdraw</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
