@extends('Layout.admin-layout')
@section('title')
    Notification
@endsection
@section('container')
    <style>
        body {
            background: white;
            min-height: 100vh;
        }
        .play-wraper{
            margin-top: 15%;
        }
    </style>
    <div class="play-wraper">
        <div class="row">
            <div class="col-12 bg-dark" style="padding-top: 10px; padding-bottom: 10px;">
                <a href="{{route('admin.notificationView')}}" class="float-left" style="color: white"><i class="fa fa-times fa-2x"></i></a>
                <h5 class="mt-1" style="color: white; text-align: center;">Notification</h5>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 p-0 mt-2 bg-white">
                    <h4>Request from {{$user->user_first_name}} {{ $user->user_last_name}}!</h4>
                    <h6>User Name is <strong>{{$user->user_username}}</strong></h6>
                    <p>This user is requesting for {{$notification->admin_inbox_subject}}. The <strong>{{$notification->account_type}}</strong> number is <strong>{{$notification->payment_number}}</strong> and the amount is <strong>{{$notification->amount}}</strong></p>

                    @if($notification->status==1)
                        <a href="{{route('admin.updateStatus', [$notification->admin_inbox_id])}}" class="btn btn-primary">Accept</a>
                    @else
                        <p style="color: red">This request already been accepted!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

