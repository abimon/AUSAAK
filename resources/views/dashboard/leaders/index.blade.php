@extends('layouts.dash',['title'=>'Leaders'])
@section('dashboard')
<div class="container">


    <div class="row">
        @foreach ($leaders as $leader)
        <div class="col-lg-4 col-md-6 p-2">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title text-uppercase fw-bolder">{{$leader->user->fname}} {{$leader->user->lname}}</h5>
                    <div class="d-flex justify-content-between">
                        <h6 class="card-subtitle mb-2 text-body-secondary text-uppercase">
                            {{$leader->role->title}}
                        </h6>
                        <div class="card-subtitle mb-2">
                            From {{$leader->from}} to {{$leader->to}}
                        </div>
                    </div>

                    <div class="card-text">
                        <?php echo html_entity_decode(mb_substr($leader->role->description, 0, 300)) . '...'; ?>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection