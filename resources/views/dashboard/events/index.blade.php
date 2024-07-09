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
                <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-2">
                            <input type="text" name="event_title" placeholder=" " id="" class="form-control">
                            <label for="">Title</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="date" name="event_date" placeholder=" " id="" class="form-control">
                            <label for="">Date</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="time" name="from" placeholder=" " id="" class="form-control">
                            <label for="">Time</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" name="event_desc" placeholder=" " id="" class="form-control">
                            <label for="">Description</label>
                        </div>
                        <div class="">
                            <label for="">Cover Image</label>
                            <div class="m-3 card p-3 border-dark bg-transparent" style="border-style:dashed;">
                                <img id="out" src="" style="width: 100%; object-fit:contain;" />
                                <input type="file" accept="image/jpeg, image/png, image/webp" name="cover" id="cover" style="display: none;" class="form-control" onchange="loadCoverFile(event)">
                                <div class="pt-2" id="desc">
                                    <div class="text-center" style="font-size: xxx-large; font-weight:bolder;">
                                        <i class="bi bi-upload"></i>
                                    </div>
                                    <div class="text-center">
                                        <label for="cover" class="btn btn-success text-white" title="Upload new profile image">Browse</label>
                                    </div>
                                    <div class="text-center prim">*File supported .png .jpg .webp</div>
                                </div>
                                <script>
                                    var loadCoverFile = function(event) {
                                        var image = document.getElementById('out');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                        document.getElementById('cover').value == image.src;
                                    };
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($events as $event)
        <div class="col-lg-4 col-md-6 p-2">
            <div class="card h-100">
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-uppercase fw-bolder">{{$event->event_title}}</h5>
                        @if ((Auth()->user()->role == 'Activity Coordinator')||(Auth()->user()->role == 'Website'))
                        <div class="row">
                            <div class="col-4"><i class="bi bi-vector-pen" data-bs-toggle="modal" data-bs-target="#Edit{{$event->id}}"></i></div>
                            <div class="col-4"><i class="bi bi-trash text-danger" data-bs-toggle="modal" data-bs-target="#Delete{{$event->id}}"></i></div>
                        </div>
                        @endif
                    </div>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-uppercase">
                        {{$event->event_date}}
                    </h6>
                    <div class="card-img-top">
                        <img id="out" src="{{asset('storage/cover/'.$event->cover)}}" style="width: 100%; object-fit:contain;" />
                    </div>
                    <div class="card-text">
                        <?php echo html_entity_decode($event->event_desc); ?>...
                    </div>
                    <div class="modal fade" id="Edit{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Event</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('event.update',$event->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-floating mb-2">
                                            <input type="text" name="event_title" value="{{$event->event_title}}" class="form-control">
                                            <label for="">Title</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="date" name="event_date" value="{{$event->event_date}}" class="form-control">
                                            <label for="">Date</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="time" name="from" value="{{$event->event_time}}" class="form-control">
                                            <label for="">Time</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="text" name="event_desc" value="{{$event->event_desc}}" class="form-control">
                                            <label for="">Description</label>
                                        </div>
                                        <div class="">
                                            <label for="">Cover Image</label>
                                            <div class="m-3 card p-3 border-dark bg-transparent" style="border-style:dashed;">
                                                <img id="out" src="{{asset('storage/cover/'.$event->cover)}}" style="width: 100%; object-fit:contain;" />
                                                <input type="file" accept="image/jpeg, image/png, image/webp" name="cover" id="cover" style="display: none;" class="form-control" onchange="loadCoverFile(event)">
                                                <div class="pt-2" id="desc">
                                                    <div class="text-center" style="font-size: xxx-large; font-weight:bolder;">
                                                        <i class="bi bi-upload"></i>
                                                    </div>
                                                    <div class="text-center">
                                                        <label for="cover" class="btn btn-success text-white" title="Upload new profile image">Browse</label>
                                                    </div>
                                                    <div class="text-center prim">*File supported .png .jpg .webp</div>
                                                </div>
                                                <script>
                                                    var loadCoverFile = function(event) {
                                                        var image = document.getElementById('out');
                                                        image.src = URL.createObjectURL(event.target.files[0]);
                                                        document.getElementById('cover').value == image.src;
                                                    };
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="Delete{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Event</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('event.destroy',$event->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        <p>Are you sure you would wish to delete this event.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-delete">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection