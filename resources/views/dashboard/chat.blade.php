@extends('layouts.app',['title'=>'Chat'])
@section('dashboard')
<div class="full-container">
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <div class="row ">
        <!-- Sidebar -->

        <div class="col-3 bg-light" id="">
          <div class="">
            <!-- Search -->
            <div class=" layer w-100">
              <input type="text" placeholder="Search contacts..." name="chatSearch" id="myInput" onkeyup="searchNames()" class="form-control p-2">
            </div>
            <!-- List -->
            <script>
              function searchNames() {
                var input = document.getElementById("myInput");
                var filter = input.value.toUpperCase();
                var ul = document.getElementById("nameList");
                var li = ul.getElementsByTagName("h6");
                var item = ul.getElementsByTagName('address');

                for (var i = 0; i < li.length; i++) {
                  var name = li[i].innerText.toUpperCase();
                  if (name.indexOf(filter) > -1) {
                    // li[i].style.display = "";
                    item[i].style.display = "";

                  } else {
                    // li[i].style.display = "none";
                    item[i].style.display = "none";

                  }
                }
              }
            </script>
            <div class="scrollable" id="nameList">
              @foreach($users as $k=>$user)
              <address>
              <a href="{{route('chat.show',$user->id)}}" style="text-decoration:none; color:black;" id="item">
                <div class="row m-2 d-flex justify-content-between">
                  <div class=" mt-3" id="tr">
                    <h6 class="">{{$user->lname}} {{$user->fname}}</h6>
                    @foreach($chats as $chat)
                    @if($chat['user_id'] == ($user->id))
                    <small class="fw-bold text-dark">{{$chat['message']}}</small>
                    @endif
                    @endforeach
                  </div>
                </div>
              </a>
              <hr>
              </address>
              @endforeach
            </div>
          </div>
        </div>
        <!-- Chat Box -->
        <div class="col-9 card" id='chat-box'>
          <div class="h-100">
            <div class="w-100">
              <!-- Header -->
              <div class="row  py-2 px-3 bg-white d-flex justify-content-between">
                <div class="col-2">
                  <a href="" title="" id='chat-sidebar-toggle' class="me-3">
                    <i class="bi bi-list"></i>
                  </a>
                </div>
                <div class="col-4">
                  @if($sender!=null)
                  <h6 class="lh-1 mB-0">{{$sender->lname}} {{$sender->fname}}</h6>
                  @endif
                </div>

                <div class="col-3 row">
                  <a href="" class="col-4" title="">
                    <i class="bi bi-camera-video"></i>
                  </a>
                  <a href="" class="col-4 td-n c-grey-900 cH-blue-500 fsz-md mR-30" title="">
                    <i class="bi bi-headset"></i>
                  </a>
                  <a href="" class="col-4 td-n c-grey-900 cH-blue-500 fsz-md" title="">
                    <i class="bi bi-three-dots"></i>
                  </a>
                </div>
              </div>
            </div>
            <hr>
            <div style="min-height: 60vh; width:100%;">
              <!-- Chat Box -->
              <div class="p-2">
                <!-- Chat Conversation -->
                @foreach($messages as $message)
                <div class="row">
                  <div class="col-6">
                    @if($message->sender_id != Auth()->user()->id)
                    <div class="bg-light p-3">
                      <div>{{$message->message}}</div>
                      <div class="text-end">{{$message->created_at->diffForHumans()}}</div>
                    </div>
                    @endif
                  </div>
                  <div class="col-6 text-end">
                    @if($message->sender_id == Auth()->user()->id)
                    <div class="bg-light p-3">
                      <div>{{$message->message}}</div>
                      <div class="text-end">{{$message->created_at->diffForHumans()}}</div>
                    </div>
                    @endif
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="layer w-100">
              @if($sender)
              <form action="{{route('chat.store',['recepient_id'=>($sender->id)])}}" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" name="message" class="form-control" placeholder="Say something ...">
                  <button class="input-group-text btn-info" type="submit"><i class="fa fa-paper-plane"></i></span>
                </div>
              </form>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection