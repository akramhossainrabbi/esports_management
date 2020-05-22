@extends('Layout.admin-layout')
@section('title')
    Add Admin
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
                <div class="card">
                    <div class="card-header" style="background-color: darkred;">
                        <div class="text-center">
                            <h2 style="color: white;">Add Admin</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Congrats !</strong> {{session('message')}}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <form method="POST" action="add-admin" class="appointment-form" id="appointment-form">
                                        @csrf
                                        <h2>Create Account</h2>
                                        <div class="form-group-1">
                                            <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Admin Name" required />
                                            <input type="username" class="form-control mt-2" name="admin_username" id="admin_username" placeholder="User Name" required />
                                            <input type="email" class="form-control mt-2" name="admin_email" id="admin_email" placeholder="Email" required />
                                            <input type="password" class="form-control mt-2" name="admin_password" id="admin_password" placeholder="Password" required />
                                            <input type="password" class="form-control mt-2 mb-2" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required />
                                        </div>
                                        <div class="form-submit">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Register Admin" />
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
