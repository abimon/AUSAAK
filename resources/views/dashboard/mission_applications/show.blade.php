@extends(Auth()->user() ==null?'layouts.app':'layouts.dash',['title'=>($app->district)])
@section(Auth()->user() ==null?'content':'dashboard')
<div class="container">
    <h2 class="text-center fw-bold">Mission Application to {{$app->district}}</h2>
    <hr>
        <div class="">
            <h2 class="text-start">
                Basic Information
            </h2>
            <hr>
            <div class="row">
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->name}}</div>
                    <label for="">Your Full Name</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->email}}</div>
                    <label for="">Your Email</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->contact}}</div>
                    <label for="">Your Phone Number</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->church}}</div>
                    <label for="">Local Church</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->district}}</div>
                    <label for="">District</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->field}}</div>
                    <label for="">Conference/Field</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->county}}
                    </div>
                    <label for="">County</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control"> {{$app->subcounty}}</div>
                    <label for="">Sub-county</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->area}}</div>
                    <label for="">Local Area/Ward</label>
                </div>
            </div>
        </div>
        <div class="">
            <h2 class="text-start">
                Evangelism History
            </h2>
            <hr>
            <div class="row">
                <div class="col-md-6 form-floating p-2">
                    <div class="form-control">
                        {{$app->year}}
                    </div>
                    <label for="">Year of last evangelism </label>
                </div>
                <div class="col-md-6 form-floating p-2">
                    <div class="form-control"> {{$app->projects}}</div>
                    <label for="">Projects established</small></label>
                </div>
                <div class="col-md-6 form-floating p-2">
                    <div class="form-control">{{$app->baptisms}}</div>
                    <label for="">Baptized members</label>
                </div>
                <div class="col-md-6 form-floating p-2">
                    <div class="form-control">{{$app->retentions}}</div>
                    <label for="">Retained members</label>
                </div>
                <div class="col-md-6 form-floating p-2">
                    <div class="form-control">{{$app->dominant_church}}</div>
                    <label for="">Dominant church(es)</label>
                </div>
                <div class="col-md-6 form-floating p-2">
                    <div class="form-control">{{$app->other_churches}}</div>
                    <label for="">Other church(es) in the area </label>
                </div>
            </div>
        </div>
        <div class="">
            <h2>Physio-social Picture</h2>
            <div class="row">
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->economic}}</div>
                    <label for="">Main economic activity of the area</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->social}}</div>
                    <label for="">Social capacity</label>
                </div>
                <div class=" col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->needs}}</div>
                    <label for="">Needs to consider</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->transport}}</div>
                    <label for="">Transport</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->condition}}</div>
                    <label for="">Transport Condition</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->water}}</div>
                    <label for="">The rea well supplied with water</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->floods}}</div>
                    <label for="">The area experience floods</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->w_source}}</div>
                    <label for="">Alternative sources of water</label>
                </div>
            </div>
        </div>
        <div class="">
            <h2 class="">Security Picture</h2>
            <div class="row">
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->security}}</div>
                    <label for="">The area experiance security conflicts</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->chief}}Km</div>
                    <label for="">Distance to chief or police</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->electricity}}</div>
                    <label for="">Electricity supply</label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control"> {{$app->energy}}</div>
                    <label for="">Other alternatives</small></label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->accommodation}}</div>
                    <label for="">Main accommodation</small></label>
                </div>
                <div class="col-md-6 p-2 form-floating">
                    <div class="form-control">{{$app->hostel}}</div>
                    <label for="">Alternative accommodation</label>
                </div>
            </div>
        </div>
</div>

@endsection