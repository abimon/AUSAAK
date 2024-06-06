@extends('layouts.dash',['title'=>'Missions'])
@section('dashboard')
<div class="container">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-plus"></i> Add Mission
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Mission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('mission.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-2">
                            <input type="text" name="location" placeholder=" " class="form-control">
                            <label for="location" class="text-capitalize">location</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" name="description" placeholder=" " class="form-control">
                            <label for="description" class="text-capitalize">description</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" name="year" placeholder=" " class="form-control">
                            <label for="year" class="text-capitalize">year</label>
                        </div>

                        <label for="cover" class="text-capitalize">cover image</label>
                        <div class="mb-2">
                            <div class="m-3 card p-3 border-dark bg-transparent" style="border-style:dashed;">
                                <img id="out" src="" style="width: 100%; object-fit:contain;" />
                                <input type="file" accept="image/jpeg, image/png, image/webp" name="cover" id="cover" style="display: none;" class="form-control" onchange="loadCoverFile(event)">
                                <div class="pt-2" id="desc">
                                    <div class="text-center" style="font-size: xxx-large; font-weight:bolder;">
                                        <i class="bi bi-upload"></i>
                                    </div>
                                    <div class="text-center">
                                        <label for="cover" class="btn btn-primary text-white" title="Upload new cover image">Browse</label>
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
        @foreach ($missions as $mission)
        <div class="col-lg-4 col-md-6 p-2">
            <div class="card h-100">
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-uppercase fw-bolder">{{$mission->location}} Mission</h5>
                        <div class="dropdown">
                            <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Photo{{$mission->id}}">Add Files</a></li>

                                <li><a class="dropdown-item" href="{{route('mission.edit',$mission->id)}}">Write report</a></li>
                                <li><a class="dropdown-item" href="">View Registration</a></li>
                                <li><a class="dropdown-item" href="#">Close Registration</a></li>
                            </ul>
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-uppercase">
                        {{$mission->county}} County
                    </h6>
                    <div class="card-text">
                        <div class="row">
                            <div class="col-4">Year</div>
                            <p class="col-8">{{$mission->year}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">

                        <div class=""></div>
                        <a href="{{route('mission.show',$mission->id)}}" class=" text-decoration-none text-primary">View more...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@foreach ($missions as $mission)
<div class="modal fade" id="Photo{{$mission->id}}" tabindex="3" aria-labelledby="Photo{{$mission->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Photo{{$mission->id}}Label">Add {{$mission->location}} Mission Photos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('m_files.store',['mission_id'=>$mission->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-2">
                        <input type="file" name="photos[]" placeholder=" " class="form-control" multiple>
                        <label for="location" class="text-capitalize">Photos</label>
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
@endforeach