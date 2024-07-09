@extends('layouts.dash',['title'=>'Messages'])
@section('dashboard')
<div class="container">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sender</th>
                <th scope="col">Recepients</th>
                <th scope="col">Type</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Sent Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $k=>$item)
            <tr>
                <td>{{$k+1}}</td>
                <td>{{$item->sender->fname}} {{$item->sender->lname}}</td>
                <td>{{$item->recepients}}</td>
                <td>{{$item->type}}</td>
                <td>{{$item->subject}}</td>
                <td>{{$item->message}}</td>
                <td>{{$item->created_at}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection