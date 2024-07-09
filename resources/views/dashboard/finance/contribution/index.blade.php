@extends('layouts.dash',['title'=>'Accounts'])
@section('dashboard')
<div class="accordion" id="accordionExample">
    <div class="container-fluid">
        <div class="text-end">
            <button class="btn btn-primary mb-2" href="" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#collapseadd" aria-expanded="true" aria-controls="collapseOne">
                <span class="text-light">+ Add Account</span>
            </button>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <h2 class="text-center fw-bold text-gray-800">Accounts</h2>
                @foreach($accounts as $key=>$account)
                <button type="button" class="btn {{$account->isOngoing?'btn-success':'btn-secondary'}} w-100 text-start mb-2" href="" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#collapse{{$account->id}}" aria-expanded="true" aria-controls="collapseOne">
                    <span class="">{{$account->name}}</span>
                </button>
                @endforeach
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        @foreach($accounts as $key=>$account)
                        <div class="accordion-item">
                            <div id="collapse{{$account->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$account->id}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h3 class="text-center">Update {{$account->name}}</h3>
                                    <form action="{{route('account.update',$account->id)}}" method="post" class="form-horizontal form-material">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-floating mb-4">
                                            <input type="number" value="{{$account->g_target}}" class="form-control" name="g_target" id="example-email">
                                            <label for="target" class="">General Target</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="number" value="{{$account->s_target}}" class="form-control" name="s_target" id="example-email">
                                            <label for="target" class="">Student Target</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="number" value="{{$account->a_target}}" class="form-control" name="a_target" id="example-email">
                                            <label for="target" class="">Associate Target</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="isOngoing" {{$account->isOngoing==1?'checked':''}}>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Active
                                            </label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary ms-auto">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="accordion-item">
                            <div id="collapseadd" class="accordion-collapse collapse show" aria-labelledby="headingadd" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h3>Create Contribution Account</h3>
                                    <form action="{{route('account.store')}}" method="post" class="form-horizontal form-material">
                                        @csrf
                                        <div class="form-group mb-4 row">
                                            <label for="example-email" class="col-6 p-0">Account Name</label>
                                            <div class="col-6 border-bottom p-0">
                                                <input type="text" class="form-control p-0 border-0" name="name" id="example-email">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 row">
                                            <label for="target" class="col-6 p-0">General Target</label>
                                            <div class="col-6 border-bottom p-0">
                                                <input type="number" class="form-control p-0 border-0" name="g_target" id="example-email">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 row">
                                            <label for="target" class="col-6 p-0">Student Target</label>
                                            <div class="col-6 border-bottom p-0">
                                                <input type="number" class="form-control p-0 border-0" name="s_target" id="example-email">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 row">
                                            <label for="target" class="col-6 p-0">Associate Target</label>
                                            <div class="col-6 border-bottom p-0">
                                                <input type="number" class="form-control p-0 border-0" name="a_target" id="example-email">
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="isOngoing" value="1" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Active
                                            </label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection