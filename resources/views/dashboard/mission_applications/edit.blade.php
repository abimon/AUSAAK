@extends(Auth()->user() ==null?'layouts.app':'layouts.dash',['title'=>'Edit Application'])
@section(Auth()->user() ==null?'content':'dashboard')
<?php
$counties = [
    "Mombasa", "Isiolo", "Murang’a", "Laikipia", "Siaya", "Kwale", "Meru",
    "Kiambu", "Nakuru", "Kisumu", "Kilifi", "Tharaka Nithi", "Turkana", "Narok", "Homa Bay",
    "Tana River", "Embu", "West Pokot", "Kajiado", "Migori", "Lamu", "Kitui", "Samburu",
    "Kericho", "Kisii", "Taita Taveta", "Machakos", "Trans Nzoia", "Bomet", "Nyamira",
    "Garissa", "Makueni", "Uasin Gishu", "Kakamega", "Nairobi City", "Wajir", "Nyandarua",
    "Elgeyo/Marakwet", "Vihiga", "Mandera", "Nyeri", "Nandi", "Bung’oma", "Marsabit",
    "Kirinyaga", "Baringo", "Busia"
];
?>
<div class="container">
    <h2>Mission Application to {{$app->district}}
    </h2>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item bg-transparent ">
            <form method="post" action="{{route('m_application.update',$app->id)}}" class="row">
                @csrf
                @method('PUT')
                <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                    <input type="hidden" name="confirm" value="1">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="pinfo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pinfo" aria-expanded="true" aria-controls="pinfo">
                                Basic Information
                            </button>
                        </h2>
                        <div id="pinfo" class="accordion-collapse collapse show" aria-labelledby="pinfo" data-bs-parent="#appliction">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="name" value="{{$app->name}}" required class="form-control">
                                        <label for="">Your Full Name</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="email" name="email" value="{{$app->email}}" required class="form-control">
                                        <label for="">Your Email</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="contact" value="{{$app->contact}}" required class="form-control">
                                        <label for="">Your Phone Number</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="church" value="{{$app->church}}" required class="form-control">
                                        <label for="">Local Church</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="district" value="{{$app->district}}" required class="form-control">
                                        <label for="">District</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="field" value="{{$app->field}}" required class="form-control">
                                        <label for="">Conference/Field</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <select name="county" class="form-select">
                                            @foreach ($counties as $county)
                                            <option {{$county == $app->county?'selected':''}} value="{{$county}}">{{$county}}</option>
                                            @endforeach
                                        </select>
                                        <label for="">County</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="subcounty" value="{{$app->subcounty}}" required class="form-control">
                                        <label for="">Sub-county</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="area" value="{{$app->area}}" required class="form-control">
                                        <label for="">Local Area/Ward</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="accmmodation">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#caccmmodation" aria-expanded="false" aria-controls="collapseTwo">
                                Evangelism History
                            </button>
                        </h2>
                        <div id="caccmmodation" class="accordion-collapse collapse" aria-labelledby="accmmodation" data-bs-parent="#application">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6 form-floating p-2">
                                        <select class="form-control" name="year" required>
                                            <?php $years = array_combine(range(date("Y"), 1990), range(date("Y"), 1990)); ?>
                                            <option value="No record" class="form-control">No record</option>
                                            @foreach($years as $year)
                                            <option value="{{$year}}" class="form-control">{{$year}}</option>
                                            @endforeach
                                        </select>
                                        <label for="">which year was the last evangelism done?</label>
                                    </div>
                                    <div class="col-md-6 form-floating p-2">
                                        <input type="text" name="projects" value="{{$app->projects}}" class="form-control">
                                        <label for="">Was there any projects(s) established? If yes, highlight. <small>(separate by comma if more than 1)</small></label>
                                    </div>
                                    <div class="col-md-6 form-floating p-2">
                                        <input type="number" name="baptisms" value="{{$app->baptisms}}" class="form-control">
                                        <label for="">How many people were baptized?</label>
                                    </div>
                                    <div class="col-md-6 form-floating p-2">
                                        <input type="number" name="retentions" value="{{$app->retentions}}" class="form-control">
                                        <label for="">How many of the baptized are still in church?</label>
                                    </div>
                                    <div class="col-md-6 form-floating p-2">
                                        <input type="text" name="dominant_church" value="{{$app->dominant_church}}" class="form-control">
                                        <label for="">Which church(es) are dominant in the area? <small>(separate by comma if more than 1)</small></label>
                                    </div>
                                    <div class="col-md-6 form-floating p-2">
                                        <input type="text" name="other_churches" value="{{$app->other_churches}}" class="form-control">
                                        <label for="">Which other church(es) are in the area? <small>(separate by comma if more than 1)</small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="accessibility">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#caccessibility" aria-expanded="false" aria-controls="caccessibility">
                                Physio-social Picture
                            </button>
                        </h2>
                        <div id="caccessibility" class="accordion-collapse collapse" aria-labelledby="accessibility" data-bs-parent="#application">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="economic" value="{{$app->economic}}" required class="form-control">
                                        <label for="">What is the major economic activity in the area?</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <textarea type="text" name="social" required class="form-control">{{$app->social}}</textarea>
                                        <label for="">How would you describe the social capacity of the area?</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="needs" value="{{$app->needs}}" required class="form-control">
                                        <label for="">Any specific needs that can be considered?</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="transport" value="{{$app->transport}}" required class="form-control">
                                        <label for="">Which main transport means could one use to access the area? <small>(Include prices from nearest main town)</small></label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="condition" value="{{$app->condition}}" required class="form-control">
                                        <label for="">What are the condition of the transport means?</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <select name="water" class="form-select">
                                            <option {{$app->water=='yes'?'selected':''}} value="yes">Yes</option>
                                            <option {{$app->water=='no'?'selected':''}} value="no">No</option>
                                            <option {{$app->water=='somehow'?'selected':''}} value="somehow">Somehow</option>
                                        </select>
                                        <label for="">Is the area well supplied with water?</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <select name="floods" class="form-select">
                                            <option {{$app->floods=='never'?'selected':''}} value="never">Never</option>
                                            <option {{$app->floods=='on heavy rains'?'selected':''}} value="on heavy rains">On heavy rains</option>
                                            <option {{$app->floods=='often'?'selected':''}} value="often">Often</option>
                                        </select>
                                        <label for="">Does the area experience floods and how often?</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="w_source" value="{{$app->w_source}}" required class="form-control">
                                        <label for="">What are some of the alternative sources of water? <small>(Include prices where applicable)</small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="security">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#csecurity" aria-expanded="false" aria-controls="csecurity">
                                Security Picture
                            </button>
                        </h2>
                        <div id="csecurity" class="accordion-collapse collapse" aria-labelledby="security" data-bs-parent="#application">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6 p-2 form-floating">
                                        <select name="security" class="form-select">
                                            <option {{$app->security=='yes'?'selected':''}} value="yes">Yes</option>
                                            <option {{$app->security=='no'?'selected':''}} value="no">No</option>
                                            <option {{$app->security=='somehow'?'selected':''}} value="somehow">Somehow</option>
                                        </select>
                                        <label for="">Does the area experiance security conflicts?</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="chief" value="{{$app->chief}}" required class="form-control">
                                        <label for="">How close in kilometers is the administration such as chief and police station from the proposed area?</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <select name="electricity" class="form-select">
                                            <option {{$app->electricity=='Well supplied'?'selected':''}} value="Well supplied">Well supplied</option>
                                            <option {{$app->electricity=='Somehow'?'selected':''}} value="Somehow">Somehow</option>
                                            <option {{$app->electricity=='No'?'selected':''}} value="No">No</option>
                                        </select>
                                        <label for="">Is the area supplied with electricity?</label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="energy" value="{{$app->energy}}" required class="form-control">
                                        <label for="">What alternatives are available to the electricity? <small>(Include prices where appicable)</small></label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="accommodation" value="{{$app->accommodation}}" required class="form-control">
                                        <label for="">Incase the request is considered, which will be the main mode of accommodation? <small>(Include prices where possible)</small></label>
                                    </div>
                                    <div class="col-md-6 p-2 form-floating">
                                        <input type="text" name="hostel" value="{{$app->hostel}}" required class="form-control">
                                        <label for="">Which alternatives are there to the above option?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection