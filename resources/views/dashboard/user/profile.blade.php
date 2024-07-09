@extends('layouts.dash',['title'=>'Profile'])
@section('dashboard')
<div class="row">
    <div class="col-md-5 p-3">
        <img src="{{asset('storage/users/passports/'.(Auth()->user()->pp_path))}}" style="height:60vh;width:100%;object-fit:cover" alt="">
        <!-- Button trigger modal -->
        <div class="text-center">
            <button type="button" class="mt-2 btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                Change
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Avatar</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('user.update',Auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="m-3 card p-3 border-dark bg-transparent" style="border-style:dashed;">
                                <img id="out" src="{{asset('storage/avatar/'.Auth()->user()->avatar)}}" style="width: 100%; object-fit:contain;" />
                                <input type="file" accept="image/jpeg, image/png, image/webp" name="avatar" id="cover" style="display: none;" class="form-control" onchange="loadCoverFile(event)">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <form action="{{route('user.update',Auth()->user()->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-2">
                <label for="" class="col-4">First Name</label>
                <input type="text" class="col-8 form-control" name="fname" value="{{Auth()->user()->fname}}">
            </div>
            <div class="row mb-2">
                <label for="" class="col-4">Middle Name</label>
                <input type="text" class="col-8 form-control" name="mname" value="{{Auth()->user()->mname}}">
            </div>
            <div class="row mb-2">
                <label for="" class="col-4">Last Name</label>
                <input type="text" class="col-8 form-control" name="lname" value="{{Auth()->user()->lname}}">
            </div>
            <div class="row mb-2">
                <label for="" class="col-4">Email</label>
                <input type="text" class="col-8 form-control" name="email" value="{{Auth()->user()->email}}">

            </div>
            <div class="row mb-2">
                <label for="" class="col-4">Phone Number</label>
                <input type="text" class="col-8 form-control" name="contact" value="{{Auth()->user()->contact}}">
            </div>
            <div class="row mb-2">
                <label for="" class="col-4">Region</label>
                <input type="text" class="col-8 form-control" name="chapter" value="{{Auth()->user()->chapter}}">
            </div>
            <div class="row mb-2">
                <label for="" class="col-4">Residence</label>
                <input type="text" class="col-8 form-control" name="current_residence" value="{{Auth()->user()->current_residence}}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-outline-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection