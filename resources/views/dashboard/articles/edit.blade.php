@extends('layouts.dash',['title'=>$article->title])
@section('dashboard')
<div class="container">
    <form method="post" action="{{route('article.update',$article->id)}}" class="row">
        @csrf
        @method('PUT')
        <div class="col-md-6 mb-2">
            <div class="form-floating">
                <input type="text" name="title" id="" value="{{$article->title}}" required class="form-control">
                <label for="">Title</label>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-floating">
                <select name="category" id="" class="form-select" required>
                    <?php $topics = [
                        ['title' => 'Devotion', 'url' => 'devotion'],
                        ['title' => 'Law and Grace', 'url' => 'law'],
                        ['title' => 'Family Life', 'url' => 'family'],
                        ['title' => 'The Sabbath', 'url' => 'sabbath'],
                        ['title' => 'Prayer', 'url' => 'prayer'],
                        ['title' => 'Christ and His Coming', 'url' => 'christ'],
                        ['title' => 'Evangelism Nuggets', 'url' => 'evangelism'],
                        ['title' => 'Life and Death', 'url' => 'life'],
                        ['title' => 'Stewardship', 'url' => 'stewardship'],
                        ['title' => 'Prophecy', 'url' => 'prophesy'],
                        ['title' => "The Word of God", 'url' => 'word'],
                        ['title' => 'Health', 'url' => 'health'],
                        ['title' => 'Salvation', 'url' => 'salvation']
                    ]; ?>
                    @foreach ($topics as $topic)
                    <option value="{{$topic['url']}}" {{$article->category==$topic['url']?'selected':''}}>{{$topic['title']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 mb-2">
            <textarea name="body" id="editor1" required>{{$article->body}}</textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>
<script src="{{asset('storage/dash/js/ckeditor.js')}}"></script>
@endsection