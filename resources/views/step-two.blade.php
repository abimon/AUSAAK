@extends('layouts.app', ['title'=>'Register'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form action="{{ route('user.update',Auth()->user()->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                        @csrf
                        @method('PUT')
                        <div class='form-floating mb-2'>
                            <input type="text" id="cr" class="form-control" placeholder=" " name="current_residence" required autocomplete="current_residence" />
                            <label for="cr">Current Residence</label>
                            <small class="text-secondary"><i>Formatted as "Town, Country" eg. Juja, Kenya</i></small>
                            @error('current_residence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class='form-floating mb-2'>
                            <select name='chapter' class='form-control' required>
                                <option value="" class='form-control text-secodary' selected disabled>Select Current Region</option>
                                <?php $chapters = ["Nairobi", "Eastern", "Central", "RiftValley", "Nyanza", "Western", "NorthEastern", "Coast", "Diaspora"]; ?>
                                @foreach($chapters as $chapter)
                                <option value="{{$chapter}}" class='form-control'>{{$chapter}}</option>
                                @endforeach
                            </select>
                            <label for="inst">Chapter</label>
                            @error('chapter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class='form-floating mb-2'>
                            <select name='inst' class='form-control' required>
                                <option value="" class='form-control text-secodary' selected disabled>Select Affliate Institution</option>
                                <?php $insts = ['JKUAT', 'MKU', 'KCA', 'CUK', 'KMTC', 'Other']; ?>
                                @foreach($insts as $inst)
                                <option value="{{$inst}}" class='form-control'>{{$inst}}</option>
                                @endforeach
                            </select>
                            <label for="inst">Chapter</label>
                            @error('chapter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class='form-floating mb-2'>
                            <select id="intake" class="form-control" name="grad_year" required>
                                <?php $years = array_combine(range(date("Y"), 1990), range(date("Y"), 1990)); ?>
                                <option value="Yet" class="form-control">Not yet</option>
                                @foreach($years as $year)
                                <option value="{{$year}}" class="form-control">{{$year}}</option>
                                @endforeach
                            </select>
                            <label for="intake">Year of Graduation</label>
                            @error('grad_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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
                        <div class="modal-footer">
                            <button type="reset" class='btn btn-outline-secondary'>Clear</button>
                            <button type="submit" class='btn btn-outline-info'>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection