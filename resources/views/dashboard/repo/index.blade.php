@extends('layouts.dash',['title'=>'Files'])
@section('dashboard')
<div class="container">
    <?php $cats = ['Ugunduzi', 'Discover', 'Health', 'Others']; ?>

    <div class="d-flex justify-content-end">
        <div class="dropdown">
            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sort by Year
            </a>
            <ul class="dropdown-menu">
                <?php $years = array_combine(range(date("Y"), 2020), range(date("Y"), 2020)); ?>
                @foreach ($years as $year)
                <li><a class="dropdown-item" onclick="sortOut('<?php echo $year; ?>')" id="{{$year}}">{{$year}}</a></li>
                @endforeach
                <script>
                    function sortOut(tit) {
                        var elements = document.querySelectorAll('.post');
                        // console.info(elements)
                        elements.forEach(element => {
                            if (element.classList.contains(tit)) {
                                // console.info(element)
                                element.style.display = '';
                            } else {
                                element.style.display = 'none';
                            }
                        });
                    }
                </script>
            </ul>
        </div>
    </div>
    <div class="row">
        @foreach ($reports as $file)
        <div class="col-lg-3 col-md-4 p-2 post {{$file->year}}">
            <div class="card">
                <img src="{{asset('storage/dash/imgs/adobe.png')}}" class="card-img-top" alt="...">
                <div class="card-body ">
                    <h5 class="card-title text-uppercase fw-bolder">{{$file->department}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-uppercase">
                        {{$file->department}}
                    </h6>
                    <div class="d-flex justify-content-between">
                        <a href="/storage/reports/{{$file->path}}" class="text-decoration-none text-info" download>Download</a>
                        <a href="/storage/reports/{{$file->path}}" class=" text-decoration-none text-primary" target="_blank">Read...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection