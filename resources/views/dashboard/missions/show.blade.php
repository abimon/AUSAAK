@extends('layouts.dash',['title'=>($mission->location).' Mission'])
@section('dashboard')
<div class="container">
    <a href="{{route('mission.index')}}"><i class="bi bi-chevron-left"></i> Back</a>
    <h2 class="text-center fw-bold">{{$mission->year}} {{$mission->location}} Mission</h2>
    <h4 class="text-uppercase">{{$mission->county}} County</h4>
    <div>
        <?php echo html_entity_decode($mission->report); ?>
    </div>
    <div class="row">
        @foreach ($mission->photos as $photo)
        <div class="col-md-4 col-6">
            <div class="card">
                <img src="{{asset('storage/mission/photos/'.$photo->path)}}" alt="" style="object-fit:cover; width: 30vw; height:30vh;">
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection