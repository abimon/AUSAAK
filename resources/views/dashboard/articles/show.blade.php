
@extends(Auth()->user() ==null?'layouts.app':'layouts.dash',['title'=>$article->title])
@section(Auth()->user() ==null?'content':'dashboard')
<div class="container p-2 mt-5">
    <div class="d-flex justify-content-between">
        <div class="">
        <h1 class="fw-bold">{{$article->title}}</h1>
    <small class="text-uppercase">{{$article->category}}</small>
        </div>
        @if ((Auth()->user()) && (Auth()->user()->role != 'Member'))
        <div class="">
            <a href="{{route('article.edit',$article->text)}}"><i class="bi bi-vector-pen"></i> Edit</a>
        </div>
        @endif
    </div>
    <div class="">
    <?php echo html_entity_decode($article->body);?>
    </div>

</div>
@endsection