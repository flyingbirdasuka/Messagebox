@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Sent messages</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(count($messages)>0)
                        @foreach($messages as $message)
                          <div class="message-list">  
                            <ul>
                                <li>To : {{$message->userTo->name}} ({{$message->userTo->email}})</li>
                                <li>Subject : {{$message->subject}}</li>
                                <li>Message : {{$message->body}}</li>
                            </ul>
                          </div>  
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
