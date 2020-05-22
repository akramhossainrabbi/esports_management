@extends('Layout.admin-layout')
@section('title')
    Game List
@endsection
@section('container')
    <style>
        body {
            background: #ffd89b;
            background: -webkit-linear-gradient(to right, #ffd89b, #19547b);
            background: linear-gradient(to right, #ffd89b, #19547b);
            min-height: 100vh;
        }
        .play-wraper{
            margin-top: 20%;
        }
    </style>
    <div class="play-wraper">
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
                            <th scope="col">Game Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0;
                        @endphp
                        @if($games)
                            @foreach($games as $game)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$game->game_name}}</td>
                                    <td width="10%" class="text-center"><a data-toggle="modal" data-target="#exampleModalCenter{{$i}}" style="color: red"><i class="fa fa-trash"></i></a></td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal" id="exampleModalCenter{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete it?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="{{route('admin.deleteGame', [$game->game_id])}}" class="btn btn-primary">Yeah</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h6 class="red-font">There is no match available</h6>
                            </div>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

