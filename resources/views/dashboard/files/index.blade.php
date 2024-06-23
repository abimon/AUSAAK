@extends('layouts.dash',['title'=>'Files'])
@section('dashboard')
<div class="container">
    <?php $cats = ['Ugunduzi', 'Discover', 'Health', 'Others']; ?>

    <div class="d-flex justify-content-end">
        <div class="dropdown">
            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sort by Category
            </a>
            <ul class="dropdown-menu">
                @foreach ($cats as $cat)
                <li><a class="dropdown-item" onclick="sortOut('<?php echo $cat; ?>')" id="{{$cat}}">{{$cat}}</a></li>
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
        @foreach ($files as $file)
        <div class="col-lg-3 col-md-4 p-2 post {{$file->category}}">
            <div class="card">
            <img src="{{asset('storage/dash/imgs/adobe.png')}}" class="card-img-top"  alt="...">
                <div class="card-body ">
                    <h5 class="card-title text-uppercase fw-bolder">{{$file->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-uppercase">
                        {{$file->category}}
                    </h6>
                    <div class="d-flex justify-content-between">
                        <a href="/storage/uploads/{{$file->path}}" class="text-decoration-none text-info" download>Download</a>
                        <a href="/storage/uploads/{{$file->path}}" class=" text-decoration-none text-primary" target="_blank">Read...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection