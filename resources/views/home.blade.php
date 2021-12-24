@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Inbox</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(count($messages)>0)
                        @foreach($messages as $message)
                          @if($message->deleted == 0)
                              <div class="message-list">  
                                <a href="/home/read/{{$message->id}}">
                                <ul>
                                    <li>From : {{$message->userFrom->name}} ({{$message->userFrom->email}})</li>
                                    <li>Subject : {{$message->subject}}</li>
                                     @if($message->read ==1)
                                       <span class="badge badge-success float-right">read</span>
                                        @else
                                        <span class="badge badge-warning float-right">not read yet</span>
                                     @endif  
                                 </ul>
                                </a>      
                           @endif
                          </div> 
                        @endforeach
                    @else         
                     <p>You have no message!</p>   
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
