@extends('layouts.dash',['title'=>$report->title])
@section('dashboard')
<div class="container p-2">
    <div class="d-flex justify-content-between">
        <div class="">
            <h1 class="fw-bold">{{date_format($report->created_at,'Y F')}} Report</h1>
            <small class="text-uppercase">{{$report->department}}</small>
        </div>
        <div class="">
            <a href="{{route('report.edit',$report->id)}}"><i class="bi bi-vector-pen"></i> Edit</a>
        </div>
    </div>
    <div class="">
        <?php echo html_entity_decode($report->details); ?>
    </div>

</div>
@endsection