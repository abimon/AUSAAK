@extends(Auth()->user() ==null?'layouts.app':'layouts.dash',['title'=>'Mission Application'])
@section(Auth()->user() ==null?'content':'dashboard')
<div class="container">
    <h1 class="text-center fw-bold">{{date('Y')}} Mission Application Form</h1>
    <hr>
    <h4 class="text-center">2 of 4</h4>
    <h4 class="text-center">Evangelism History</h4>
    <form action="{{route('m_application.update',$mission->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 form-floating p-2">
                <select  class="form-control" name="year" required>
                    <?php $years = array_combine(range(date("Y"), 1990), range(date("Y"), 1990)); ?>
                    <option value="No record" class="form-control">No record</option>
                    @foreach($years as $year)
                    <option value="{{$year}}" class="form-control">{{$year}}</option>
                    @endforeach
                </select>
                <label for="">which year was the last evangelism done?</label>
            </div>
            <div class="col-md-6 form-floating p-2">
                <input type="text" name="projects" placeholder=" " id="" class="form-control">
                <label for="">Was there any projects(s) established? If yes, highlight. <small>(separate by comma if more than 1)</small></label>
            </div>
            <div class="col-md-6 form-floating p-2">
                <input type="number" name="baptisms" placeholder=" " id="" class="form-control">
                <label for="">How many people were baptized?</label>
            </div>
            <div class="col-md-6 form-floating p-2">
                <input type="number" name="retentions" placeholder=" " id="" class="form-control">
                <label for="">How many of the baptized are still in church?</label>
            </div>
            <div class="col-md-6 form-floating p-2">
                <input type="text" name="dominant_church" placeholder=" " id="" class="form-control">
                <label for="">Which church(es) are dominant in the area? <small>(separate by comma if more than 1)</small></label>
            </div>
            <div class="col-md-6 form-floating p-2">
                <input type="text" name="other_churches" placeholder=" " id="" class="form-control">
                <label for="">Which other church(es) are in the area? <small>(separate by comma if more than 1)</small></label>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary"><i class="bi bi-upload"></i> Save & Continue</button>
        </div>
    </form>
</div>
@endsection