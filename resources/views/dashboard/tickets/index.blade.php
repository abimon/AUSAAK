@extends('layouts.dash',['title'=>'Articles'])
@section('dashboard')
<div class="container">
    <div class="d-flex justify-content-end">
        <div class="dropdown">
            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sort by Department
            </a>
            <ul class="dropdown-menu">
                <?php $deps = [
                    'All', 'Developer', 'Communication', 'Secretary'
                ]; ?>
                @foreach ($deps as $dep)
                <li><a class="dropdown-item" onclick="sortOut('<?php echo $dep; ?>')" id="{{$dep}}">{{$dep}}</a></li>
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
        @foreach ($tickets as $ticket)
        <div class="col-lg-4 col-md-6 p-2 post All {{$ticket->department}}">
            <div class="card {{$ticket->isSolved?'':($ticket->department=='Developer'?'bg-danger text-light':($ticket->department=='Communication'?'bg-warning text-light':'bg-primary text-light'))}} h-100">
                <div class="card-body">
                    @if(!($ticket->isSolved))
                    <div class="d-flex justify-content-end">
                        <form action="{{route('ticket.update',$ticket->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <button type="submit" class="btn btn-outline-dark">Solved</button>
                            </div>
                        </form>
                    </div>
                    @endif
                    <h5 class="card-title text-uppercase fw-bolder">{{$ticket->subject}}</h5>

                    <h6 class="card-subtitle mb-2 {{$ticket->isSolved?($ticket->department=='Developer'?'text-danger':($ticket->department=='Communication'?'text-warning':'text-info')):'text-body-secondary'}} text-uppercase">
                        {{$ticket->department}}
                    </h6>
                    <div class="card-text">
                        <?php echo html_entity_decode(mb_substr($ticket->issue, 0, 200)); ?>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection