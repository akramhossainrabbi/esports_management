@extends('Layout.admin-layout')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/style.css">
@endsection
@section('title')
    User List
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
            <div class="col-12 p-0">
                @if($Users)
                    @php
                        $i =1;
                    @endphp
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Users as $user)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$user->user_first_name}} {{$user->user_last_name}}</td>
                                        <td>{{$user->user_username}}</td>
                                        <td>{{$user->user_email}}</td>
                                        <td>{{$user->mobile}}</td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
