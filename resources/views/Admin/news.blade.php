@extends('Layout.admin-layout')
@section('title')
    Add News
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
                            <h2 style="color: white;">Add News</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <form method="POST" action="/esport.admin.login.panel/add-news" class="appointment-form" id="appointment-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group-1">
                                            <label for="news_image">Add image 800 x 600</label>
                                            <input type="file" class="form-control" name="news_image" id="news_image" placeholder="Add Image" required />
                                            <input type="url" class="form-control mt-3" name="news_feed_link" id="news_feed_link" placeholder="Add Link" required />
                                            <input type="text" class="form-control mt-3" name="news_feed_header" id="news_feed_header" placeholder="Add Main Header" required />
                                            <textarea class="form-control mt-3 mb-3" name="news_feed_sub_header" id="news_feed_sub_header" placeholder="Add News" required></textarea>
                                        </div>
                                        <div class="form-submit">
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
