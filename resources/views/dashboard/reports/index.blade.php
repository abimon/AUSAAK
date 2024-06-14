@extends('layouts.dash',['title'=>'Articles'])
@section('dashboard')
<div class="container">
    <div class="d-flex justify-content-end">
        <div class="dropdown">
            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sort by Topic
            </a>
            <ul class="dropdown-menu">
                @foreach ($topics as $topic)
                <li><a class="dropdown-item" onclick="sortOut('<?php echo $topic['url']; ?>')" id="{{$topic['url']}}">{{$topic['title']}}</a></li>
                @endforeach
                <script>
                    function sortOut(tit) {
                        var elements = document.querySelectorAll('.post');
                        // console.info(elements)
                        elements.forEach(element => {
                            if (element.classList.contains(tit)) {
                                // console.info(element)
                                element.style.display = '';
                            }
                            else{
                                element.style.display = 'none';
                            }
                        });
                    }
                </script>
            </ul>
        </div>
    </div>
    
    <div class="row">
        @foreach ($reports as $report)
        <div class="col-lg-4 col-md-6 p-2 post {{$report->category}}">
            <div class="card">
                <div class="card-body " >
                    <h5 class="card-title text-uppercase fw-bolder">{{$report->title}}</h5>
                    
                    <div class="card-text">
                        <?php echo html_entity_decode(mb_substr($report->path, 0, 300)); ?>...
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-between">
                            <div class="col-4">{{$report->comments}} <i class="bi bi-chat"></i></div>
                            <div class="col-4">{{$report->views}} <i class="bi bi-eye"></i></div>
                        </div>
                        <a href="{{route('report.show',$report->id)}}" class=" text-decoration-none text-primary">Read...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection