@extends('Layout.user-layout')
@section('title')
    Tutorial
@endsection
@section('container')
    <style>
        body {
            background: #ffffff;
        }
    </style>
    <div class="play-wraper">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 bg-white">
               <div class="container">
                  <h2>How to add money?</h2>
                  <p>Play this tutorial to learn how to add money to your account!</p>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=lI3RQKxFt5Y&fbclid=IwAR3qClcfwsgo_HLYu962qG3unyJfIqnS5v3A2iBEiI5xe7suiTt3vjFRlQo
"></iframe>
                  </div>
                </div>
                <div class="container mt-3">
                  <h2>How to play?</h2>
                  <p>Play this tutorial to learn how to join and play!</p>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                  </div>
                </div>
                <div class="container mt-3">
                  <h2>How to withdraw money?</h2>
                  <p>Play this tutorial to learn how to withdraw money from your account!</p>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                  </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
