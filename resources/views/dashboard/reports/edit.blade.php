@extends('layouts.dash',['title'=>'Update Report'])
@section('dashboard')
<div class="container">
    <form method="post" action="{{route('report.update',$report->id)}}" class="row">
        @csrf
        @method('PUT')
        <div class="col-12 mb-2">
            <textarea name="path" id="editor1" required>{{$report->path}}</textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection