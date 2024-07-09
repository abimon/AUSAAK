@extends('layouts.dash',['title'=>'Messaging'])
@section('dashboard')
<div class="container">
    <form action="{{route('message.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="form-floating">
                    <select name="category" id="cat" class="form-select">
                        @foreach ($cats as $cat)
                        <option value="{{$cat}}">{{$cat}}</option>
                        @endforeach
                    </select>
                    <label for="">Message Type</label>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-floating">
                    <select name="recepients" id="" class="form-select">
                        @foreach ($res as $re)
                        <option value="{{$re}}">{{$re}}</option>
                        @endforeach
                    </select>
                    <label for="">Recepients</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-2">
            <input type="text" name="subject" id="" placeholder=" " class="form-control">
            <label for="">Subject</label>
        </div>
        <div class="mb-2">
            <div class="form-floating">
                <textarea name="message" style="width: 100%;height:40vh;border: 2px solid grey; border-radius:6px;"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-envelope-arrow-up"></i> Send
            </button>
        </div>
    </form>

</div>
@endsection