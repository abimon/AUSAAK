@extends(Auth()->user() ==null?'layouts.app':'layouts.dash',['title'=>'Articles'])
@section(Auth()->user() ==null?'content':'dashboard')
<div class="container mt-5">
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
        @foreach ($articles as $article)
        <div class="col-lg-4 col-md-6 p-2 post {{$article->category}}">
            <div class="card">
                <div class="card-body " >
                    <h5 class="card-title text-uppercase fw-bolder">{{$article->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary text-uppercase">
                        @foreach ($topics as $topic)
                        @if ($topic['url'] == $article->category)
                        {{$topic['title']}}
                        @endif
                        @endforeach
                    </h6>
                    <div class="card-text">
                        <?php echo html_entity_decode(mb_substr($article->body, 0, 300)); ?>...
                    </div>
                    <!-- <a href="{{route('react.create',['post_id'=>$article->id])}}"> -->
                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-between">
                            <div class="col-4">{{$article->likes->count()}} <i class="bi bi-heart"></i></div>
                            <div class="col-4">{{$article->comments->count()}} <i class="bi bi-chat"></i></div>
                            <div class="col-4">{{$article->views->count()}} <i class="bi bi-eye"></i></div>
                        </div>
                        <a href="{{route('article.show',$article->text)}}" class=" text-decoration-none text-primary">Read...</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection