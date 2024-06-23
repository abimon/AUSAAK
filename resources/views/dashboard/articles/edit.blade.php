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
<script>
    var i = 20;
    for (j = 0; j < i; j++) {
        CKEDITOR.ClassicEditor
            .create(document.getElementById("editor" + j), {
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },

                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }]
                },
                htmlEmbed: {
                    showPreviews: true
                },
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                mention: {
                    feeds: [{
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }]
                },
                removePlugins: [
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                ]
            }).then(editor => {
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '60vh', editor.editing.view.document.getRoot());
                    writer.setStyle('background-color', 'transparent', editor.editing.view.document.getRoot());
                });
            });
    }
</script>
@endsection