@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>message</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <ul>
                            <li>From : {{$message->userFrom->name}} ({{$message->userFrom->email}})</li>
                            <li>Subject : {{$message->subject}}</li>
                            <li>Message : {{$message->body}}</li>
                        </ul>
                         <a href="/home/reply/{{$message->userFrom->id}}/{{$message->subject}}">Reply</a> 
                         <a class="badge badge-danger float-right" href="/home/delete/{{$message->id}}">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
