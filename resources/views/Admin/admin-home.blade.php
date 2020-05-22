@extends('Layout.admin-layout')
@section('title')
    Home
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
                            <h2 style="color: white;">Add Game</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <form method="POST" action="home" class="appointment-form" id="appointment-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group-1">
                                            <input type="text" class="form-control" name="game_name" id="game_name" placeholder="Game Name" required />
                                            <input type="file" class="form-control mt-2" name="game_image" id="game_image" placeholder="Game Image" required/>
                                        </div>
                                        <div class="form-submit mt-2">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Save" />
                                        </div>
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
