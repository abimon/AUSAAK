@extends(Auth()->user() ==null?'layouts.app':'layouts.dash',['title'=>'Mission Application'])
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
    <h1 class="text-center fw-bold">{{date('Y')}} Mission Application Form</h1>
    <hr>
    <h4 class="text-center">1 of 4</h4>
    <h4 class="text-center">Basic Information</h4>
    <form action="{{route('m_application.store')}}" method="post">
    @csrf
        <div class="row">
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="name" placeholder=" " value="{{Auth()->user()?(Auth()->user()->fname).' '.(Auth()->user()->lname):''}}" required id="" class="form-control">
                <label for="">Your Full Name</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="email" name="email" placeholder=" " value="{{Auth()->user()?Auth()->user()->email:''}}" required id="" class="form-control">
                <label for="">Your Email</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="contact" placeholder=" " value="{{Auth()->user()?Auth()->user()->contact:''}}" required id="" class="form-control">
                <label for="">Your Phone Number</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="church" placeholder=" " required id="" class="form-control">
                <label for="">Local Church</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="district" placeholder=" " required id="" class="form-control">
                <label for="">District</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="field" placeholder=" " required id="" class="form-control">
                <label for="">Conference/Field</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <select name="county" id="" class="form-select">
                    <option selected disabled>Select County</option>
                    @foreach ($counties as $county)
                    <option value="{{$county}}">{{$county}}</option>
                    @endforeach
                </select>
                <label for="">County</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="subcounty" placeholder=" " required id="" class="form-control">
                <label for="">Sub-county</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="area" placeholder=" " required id="" class="form-control">
                <label for="">Local Area/Ward</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-upload"></i> Save & Continue
            </button>
        </div>
    </form>
</div>
@endsection