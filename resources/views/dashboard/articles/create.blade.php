@extends('layouts.dash',['title'=>'Create Article'])
@section('dashboard')
<div class="container">
    <form method="post" action="{{route('article.store')}}" class="row">
        @csrf
        <div class="col-md-6 mb-2">
            <div class="form-floating">
                <input type="text" name="title" id="" value="{{ old('title') }}" placeholder=" " class="form-control" required>
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
                    <option value="" selected disabled>Select Category</option>
                    @foreach ($topics as $topic)
                    <option value="{{$topic['url']}}">{{$topic['title']}}</option>
                    @endforeach
                </select>
                <label for="">Category</label>
            </div>

        </div>
        <div class="col-12 mb-2">
            <textarea name="body" id="editor1">{{ old('body') }}</textarea>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Post</button>
        </div>
    </form>
</div>
@endsection