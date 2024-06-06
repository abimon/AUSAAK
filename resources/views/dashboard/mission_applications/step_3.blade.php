@extends(Auth()->user() ==null?'layouts.app':'layouts.dash',['title'=>'Mission Application'])
@section(Auth()->user() ==null?'content':'dashboard')
<div class="container">
    <h1 class="text-center fw-bold">{{date('Y')}} Mission Application Form</h1>
    <hr>
    <h4 class="text-center">3 of 4</h4>
    <h4 class="text-center">Physio-social Picture</h4>
    <form action="{{route('m_application.update',$app->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="economic" placeholder=" " required class="form-control">
                <label for="">What is the major economic activity in the area?</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <textarea type="text" name="social" placeholder=" " required class="form-control"></textarea>
                <label for="">How would you describe the social capacity of the area?</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="needs" placeholder=" " required class="form-control">
                <label for="">Any specific needs that can be considered?</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="transport" placeholder=" " required class="form-control">
                <label for="">Which main transport means could one use to access the area? <small>(Include prices from nearest main town)</small></label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="condition" placeholder=" " required class="form-control">
                <label for="">What are the condition of the transport means?</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <select name="water" id="" class="form-select">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="somehow">Somehow</option>
                </select>
                <label for="">Is the area well supplied with water?</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <select name="floods" id="" class="form-select">
                    <option value="never">Never</option>
                    <option value="on heavy rains">On heavy rains</option>
                    <option value="often">Often</option>
                </select>
                <label for="">Does the area experience floods and how often?</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="w_source" placeholder=" " required class="form-control">
                <label for="">What are some of the alternative sources of water? <small>(Include prices where applicable)</small></label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="bi bi-upload"></i> Save & Continue</button>
        </div>
    </form>
</div>
@endsection