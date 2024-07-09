@extends(Auth()->user() ==null?'layouts.app':'layouts.dash',['title'=>'Mission Application'])
@section(Auth()->user() ==null?'content':'dashboard')
<div class="container">
    <h1 class="text-center fw-bold">{{date('Y')}} Mission Application Form</h1>
    <hr>
    <h4 class="text-center">4 of 4</h4>
    <h4 class="text-center">Security Picture</h4>
    <form action="{{route('m_application.update',$app->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 p-2 form-floating">
                <select name="security" id="" class="form-select">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="somehow">Somehow</option>
                </select>
                <label for="">Does the area experiance security conflicts?</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="chief" placeholder=" " required class="form-control">
                <label for="">How close in kilometers is the administration such as chief and police station from the proposed area?</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <select name="electricity" id="" class="form-select">
                    <option value="Well supplied">Well supplied</option>
                    <option value="Somehow">Somehow</option>
                    <option value="No">No</option>
                </select>
                <label for="">Is the area supplied with electricity?</label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="energy" placeholder=" " required class="form-control">
                <label for="">What alternatives are available to the electricity? <small>(Include prices where appicable)</small></label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="accommodation" placeholder=" " required class="form-control">
                <label for="">Incase the request is considered, which will be the main mode of accommodation? <small>(Include prices where possible)</small></label>
            </div>
            <div class="col-md-6 p-2 form-floating">
                <input type="text" name="hostel" placeholder=" " required class="form-control">
                <label for="">Which alternatives are there to the above option?</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="bi bi-upload"></i> Complete</button>
        </div>
    </form>
</div>
@endsection