@extends('Layout.admin-layout')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/style.css">
@endsection
@section('title')
    Notification
@endsection
@section('container')
    <style>
        body {
            background: white;
            min-height: 100vh;
        }
        .bg-unread{
            background-color: #d2d7b4;
        }
        .play-wraper{
            margin-top: 10%;
        }
    </style>
    <div class="play-wraper">
        <div class="row">
            <div class="col-12 p-0 mt-2 bg-white">
                <hr>
                @foreach($notification as $notifi)
                    @if($notifi->status==1)
                        <a href="{{route('admin.fullNotification', [$notifi->admin_inbox_id])}}" style="text-decoration: none; color: black">
                            <div class="bg-unread" style="padding-left: 8px;">
                                <div class="small text-gray-500">{{$notifi->date}}</div>
                                You have a {{$notifi->admin_inbox_subject}} request!
                            </div>
                        </a>
                        <hr>
                    @endif
                @endforeach

                @foreach($notification as $notifi)
                    @if($notifi->status==0)
                        <a href="{{route('admin.fullNotification', [$notifi->admin_inbox_id])}}" style="text-decoration: none; color: black">
                            <div style="padding-left: 8px;">
                                <div class="small text-gray-500">{{$notifi->date}}</div>
                                You have a {{$notifi->admin_inbox_subject}} request!
                            </div>
                        </a>
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection

