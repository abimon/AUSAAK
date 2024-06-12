@extends('layouts.dash',['title'=>'Create Ticket'])
@section('dashboard')

<div class="container">
    <form method="post" action="{{route('ticket.store')}}" class="row">
        @csrf
        <div class="col-md-6 mb-2">
            <div class="form-floating">
                <select name="department" id="" class="form-select" required>
                    <?php $deps = ['Developer','Communication','Secretary'
                    ]; ?>
                    <option value="" selected disabled>Select Related Department</option>
                    @foreach ($deps as $dep)
                    <option value="{{$dep}}">{{$dep}}</option>
                    @endforeach
                </select>
                <label for="">Department</label>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-floating">
                <input type="email" name="email" id="" value="{{ old('email')!=null?old('email'):(Auth()->user()?Auth()->user()->email:'') }}" placeholder=" " class="form-control" required>
                <label for="">Email</label>
            </div>
        </div>
        <div class="mb-2">
            <div class="form-floating">
                <input type="text" name="subject" id="" value="{{ old('subject') }}" placeholder=" " class="form-control" required>
                <label for="">Subject</label>
            </div>
        </div>
        <label for="">Issue</label>
        <div class="col-12 mb-2">
            <textarea name="issue" id="editor1" maxlength="200">{{ old('issue') }}</textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</div>
@endsection