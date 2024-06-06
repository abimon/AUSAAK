@extends('layouts.dash',['title'=>'Events'])
@section('dashboard')
<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus"></i> Add Event
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('event.store')}}" method="post">
                @csrf
                    <div class="modal-body">
                        <div class="form-floating">
                            <input type="text" name="event_title" placeholder=" " id="" class="form-control">
                            <label for="">Title</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="event_date" placeholder=" " id="" class="form-control">
                            <label for="">Date</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="from" placeholder=" " id="" class="form-control">
                            <label for="">Time</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="event_desc" placeholder=" " id="" class="form-control">
                            <label for=""></label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="" placeholder=" " id="" class="form-control">
                            <label for=""></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($events as $event)
        <div class="col-lg-4 col-md-6 p-2">
            <div class="card">
                <div class="card-body ">
                    <h5 class="card-title text-uppercase fw-bolder">{{$event->event_title}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-uppercase">
                        {{$event->event_date}}
                    </h6>
                    <div class="card-text">
                        <?php echo html_entity_decode(mb_substr($event->event_desc, 0, 300)); ?>...
                    </div>
                    <!-- <a href="{{route('react.create',['post_id'=>$article->id])}}"> -->
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-between">
                            <div class="col-4"><i class="bi bi-vector-pen"></i></div>
                            <div class="col-4"><i class="bi bi-eye"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection