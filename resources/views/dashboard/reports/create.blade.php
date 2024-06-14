@extends('layouts.dash',['title'=>'Create Report'])
@section('dashboard')

<div class="container">
    <form method="post" action="{{route('report.store')}}" class="row">
        @csrf
        <div class="col-12 mb-2">
            <textarea name="path" id="editor1">{{ old('path') }}</textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection