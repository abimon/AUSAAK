@extends('layouts.dash',['title'=>'Roles'])
@section('dashboard')
<div class="container">
    <div class="d-flex justify-content-between mb-1">
    <h2 class="text-gray-800 fw-bold text-center">Roles & Responsibilities</h2>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#role">
            Add Role
        </button>
    </div>
    <div class="modal fade" id="role" tabindex="-1" aria-labelledby="roleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="roleLabel">Add Role</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('role.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-2">
                            <input type="text" name="title" placeholder=" " class="form-control">
                            <label for="location" class="text-capitalize">Role</label>
                        </div>
                        <label for="">Description</label>
                        <textarea name="description" id="editor30" class="form-control"></textarea>
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
        @foreach ($roles as $role)
        <div class="col-lg-4 col-md-6 p-2 ">
            <div class="card h-100">
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-uppercase fw-bolder">{{$role->title}}</h5>
                        <div class="dropdown">
                            <div class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Role{{$role->id}}">Edit</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#new">Assign</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="card-text">
                        <?php echo html_entity_decode(mb_substr($role->description,0,300)).'...'; ?>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@foreach ($roles as $role)
<div class="modal fade" id="Role{{$role->id}}" tabindex="-1" aria-labelledby="roleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="roleLabel">Edit {{$role->title}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('role.update',$role->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-floating mb-2">
                        <input type="text" name="title" value="{{$role->title}}" class="form-control">
                        <label for="location" class="text-capitalize">Role</label>
                    </div>
                    <label for="">Description</label>
                    <textarea name="description" id="editor{{$role->id}}" class="form-control">{{$role->description}}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>
<script src="{{asset('storage/dash/js/ckeditor.js')}}"></script>
@endforeach