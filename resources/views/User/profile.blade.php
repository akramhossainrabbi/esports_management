@extends('Layout.user-layout')
@section('title')
    Profile
@endsection
@section('container')
<style>
    body{
        background: black;
        min-height: 100vh;
    }
    .topbar-divider {
        width: 0;
        border-right: 1px solid
        #e3e6f0;
        height: calc(4.375rem - 2rem);
        margin: auto 1rem;
    }
    .d-sm-block {
        display: block !important;
    }
    .small-font{
        font-size: 12px;
    }
    .rounded-btn{/*dent around button*/
        display: inline-block;
        position: relative;
        text-decoration: none;
        color: rgba(3, 169, 244, 0.54);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        text-align: center;
        background: #f7f7f7;
        box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.08);
    }
    .rounded-btn .fa {/*Button itself*/
        position: absolute;
        content: '';
        width: 40px;
        height: 40px;
        line-height: 40px;
        vertical-align: middle;
        left: 10px;
        top: 9px;
        border-radius: 50%;
        font-size: 15px;
        background-image: -webkit-linear-gradient(#e8e8e8 0%, #d6d6d6 100%);
        background-image: linear-gradient(#e8e8e8 0%, #d6d6d6 100%);
        text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.66);
        box-shadow: inset 0 2px 0 rgba(255,255,255,0.5), 0 2px 2px rgba(0, 0, 0, 0.19);
        border-bottom: solid 2px #b5b5b5;
    }

    .rounded-btn .fa:active{
        background-image: -webkit-linear-gradient(#efefef 0%, #d6d6d6 100%);
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.5), 0 2px 2px rgba(0, 0, 0, 0.19);
        border-bottom: solid 2px #d8d8d8;
    }
    .card{
        background-color: #00f7ba;
        margin-bottom: 0px;
    }
    .button {
        background-color: #2095f3;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: .25rem;
    }
    .circle-img {
        border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        -o-border-radius: 50%;
    }
    .center-img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }
    .fancy {
      /* At the bottom of our background stack,
         let's have a misty grey solid color */
      background-color: #E4E4D9;

      /* We stack linear gradients on top of each
         other to create our color strip effect.
         As you will notice, color gradients are
         considered to be images and can be
         manipulated as such */
      background-image: linear-gradient(175deg, rgba(0,0,0,0) 95%, #8da389 95%),
                        linear-gradient( 85deg, rgba(0,0,0,0) 95%, #8da389 95%),
                        linear-gradient(175deg, rgba(0,0,0,0) 90%, #b4b07f 90%),
                        linear-gradient( 85deg, rgba(0,0,0,0) 92%, #b4b07f 92%),
                        linear-gradient(175deg, rgba(0,0,0,0) 85%, #c5a68e 85%),
                        linear-gradient( 85deg, rgba(0,0,0,0) 89%, #c5a68e 89%),
                        linear-gradient(175deg, rgba(0,0,0,0) 80%, #ba9499 80%),
                        linear-gradient( 85deg, rgba(0,0,0,0) 86%, #ba9499 86%),
                        linear-gradient(175deg, rgba(0,0,0,0) 75%, #9f8fa4 75%),
                        linear-gradient( 85deg, rgba(0,0,0,0) 83%, #9f8fa4 83%),
                        linear-gradient(175deg, rgba(0,0,0,0) 70%, #74a6ae 70%),
                        linear-gradient( 85deg, rgba(0,0,0,0) 80%, #74a6ae 80%);
    }
    .instraction{
        background-color: black;
        padding: 10px 15px;
    }
</style>
<div class="play-wraper mt-0">
  <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 13%;">
          <div class="row">
            <div class="col-md-12 text-center">
              <img src="{{ asset('images') }}/user_image/{{$users->image}}" alt="" class="circle-img center-img img-fluid" style="height: 160px; width: 160px; margin-top: 5%">
              <h3 class="mt-3" style="font-weight: bold;">{{$users->user_first_name}} {{$users->user_last_name}}</h3>
            </div>
          </div>  
          <div class="row fancy" style="border-radius: .25rem;">
              <div class="col-12 text-center mt-3">
                  @if($balance)
                      <h6 style="font-weight: bold;">Balance Tk. {{$balance->balance_amount}}</h6>
                  @else
                      <h6 style="font-weight: bold;">Balance Tk. 00</h6>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 p-0 mt-3">
                  <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-3 text-center" style="color: white;">
                                  @if($kills!==null)
                                      <strong>{{$kills->total_match}}</strong>
                                      <p class="small-font">Matches Played</p>
                                  @else
                                      <strong>00</strong>
                                      <p class="small-font">Matches Played</p>
                                  @endif
                              </div>
                              <div class="topbar-divider d-none d-sm-block"></div>
                              <div class="col-3 text-center" style="color: white;">
                                  @if($kills!==null)
                                      <strong>{{$kills->kills}}</strong>
                                      <p class="small-font">Total Kill</p>
                                  @else
                                      <strong>00</strong>
                                      <p class="small-font">Total Kill</p>
                                  @endif
                              </div>
                              <div class="topbar-divider d-none d-sm-block"></div>
                              <div class="col-3 text-center" style="color: white;">
                                  @if($earns!==null)
                                      <strong>{{$earns->total_earn_amount}}</strong>
                                      <p class="small-font">Amount Won</p>
                                  @else
                                      <strong>00</strong>
                                      <p class="small-font">Amount Won</p>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row mt-3">
              <div class="col-12 p-0">
                  <table class="table bg-white">
                      <tbody>
                        <tr style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal2">
                          <th scope="row" width="10%"><i class="fa fa-smile-o"></i></th>
                          <td>Add Money</td>
                          <td width="10%"><a style="color: #00f7ba;"><i class="fa fa-chevron-right"></i></a></td>
                      </tr>
                      <tr onclick="location.href='{{route('user.transactionView')}}';" style="cursor: pointer;">
                          <th scope="row" width="10%"><i class="fa fa-google-wallet"></i></th>
                          <td>Withdraw</td>
                          <td width="10%"><a href="{{route('user.transactionView')}}"><i class="fa fa-chevron-right"></i></a></td>
                      </tr>
                      <tr onclick="location.href='https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/PlayForMoneyP4M/.com&display=popup';" style="cursor: pointer;">
                          <th scope="row" width="10%"><i class="fa fa-share-alt"></i></th>
                          <td>Share</td>
                          <td width="10%"><a href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/PlayForMoneyP4M/.com&display=popup"><i class="fa fa-chevron-right"></i></a></td>
                      </tr>
                      <tr data-toggle="modal" data-target="#exampleModal" style="cursor: pointer;">
                          <th scope="row" width="10%"><i class="fa fa-support"></i></th>
                          <td>Support</td>
                          <td width="10%"><a style="color: #00f7ba;"><i class="fa fa-chevron-right"></i></td>

                      </tr>
                      <tr onclick="location.href='{{route('user.logout')}}';" style="cursor: pointer;">
                          <th scope="row" width="10%"><i class="fa fa-sign-out"></i></th>
                          <td>Logout</td>
                          <td width="10%"><a href="{{route('user.logout')}}"><i class="fa fa-chevron-right"></i></a></td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="form">
                <form role="form" class="contactForm">
                  <h6>Please let us know how can we help you?</h6>
                  <div id="sendmessage" style="display: none; color: green;"></div>
                  <div id="errormessage"></div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="contact_subject" id="contact_subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="contact_messege" id="contact_messege" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                  </div>
                  <div class="text-center"><button type="submit" class="submit-messege">Send Message</button></div>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <a type="button" class="instraction" style="color: white;">How to add money?</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-center">
                        <div class="card shadow-lg p-3 rounded" style="background-color: #f2f2f2">
                            <a href="{{route('user.addMoneyView')}}" style="color: black;">
                                <img src="{{asset('images')}}/icons/bikash.png" alt="" style="max-width: 70px; max-height: 70px; padding-top: 10px;">
                                <p style="margin-top: 15px; margin-bottom: 0px;">bKash</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div  class="card shadow-lg p-3 rounded" style="background-color: #f2f2f2">
                            <a href="{{route('user.addRocketMoneyView')}}" style="color: black">
                                <img src="{{asset('images')}}/icons/ROCKET.png" alt="" style="max-width: 70px; max-height: 70px; padding-top: 10px;">
                                <p style="margin-top: 15px; margin-bottom: 0px;">Rocket</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p style="color: #8b3510;">* Mobile Top-up is not applicable for payment</p>
                    </div>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
      $('.submit-messege').click(function(){
        $contact_subject = $('#contact_subject').val();
        $contact_messege = $('#contact_messege').val();
        console.log($contact_subject, $contact_messege)

        if($contact_subject != '' & $contact_messege != ''){
              $.ajax({
                type : 'POST',
                url : '{{ route('user.suportSend') }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{'contact_subject':$contact_subject, 'contact_messege':$contact_messege,},
                success:function(result){
                    $('#sendmessage').show();
                    $('#sendmessage').html(result.success);
                    $("#contact_subject, #contact_messege").val("");
                },
            });
          }
      });
  });
</script>
@endsection
