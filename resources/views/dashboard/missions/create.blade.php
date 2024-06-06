@extends('layouts.dash',['title'=>'Mission Report'])
@section('dashboard')
<div class="container">
    <h2 class="text-center fw-bold">{{$mission->location}} Mission Report</h2>
    <form method="post" action="{{route('mission.update',$mission->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <textarea name="report" id="editor1">{{$mission->report}}</textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
</div>
@endsection