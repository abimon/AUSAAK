@extends('layouts.dash',['title'=>'Mission Applications'])
@section('dashboard')
<div class="container">
    <div class="d-flex justify-content-end">
        <a href="{{route('m_application.create')}}"><button class="btn btn-outline-primary"><i class="fa fa-plus"></i> Apply</button></a>
    </div>
    <div class="row">
        @foreach ($apps as $app)
        <div class="col-lg-4 col-md-6 p-2 post {{$app->district}}">
            <div class="card {{$app->isPicked?'bg-success  text-light':''}}">
                <div class="card-body ">
                    <h5 class="card-title text-uppercase fw-bolder">{{$app->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-uppercase">
                        {{$app->contact}}
                    </h6>
                    <div class="card-text">
                        <div class="row">
                            <div class="col-4">Field</div>
                            <p class="col-8">{{$app->field}}</p>
                        </div>
                        <div class="row">
                            <div class="col-4">District</div>
                            <p class="col-8">{{$app->district}}</p>
                        </div>
                        <div class="row">
                            <div class="col-4">County</div>
                            <p class="col-8">{{$app->county}}</p>
                        </div>
                        <div class="row">
                            <div class="col-4">Sub-County</div>
                            <p class="col-8">{{$app->subcounty}}</p>
                        </div>
                        <div class="row">
                            <div class="col-4">Local Area</div>
                            <p class="col-8">{{$app->area}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <!-- <form action="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" onclick="">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Select
                                </label>
                            </div>
                        </form> -->
                        <div class=""></div>
                        <a href="{{route('m_application.show',$app->id)}}" class=" text-decoration-none text-primary">View more...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection