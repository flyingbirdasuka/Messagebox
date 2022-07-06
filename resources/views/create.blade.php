@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <form action="/home" method="post">
                            @csrf
                         <div class="form-group">
                            <label for="to">To:</label>
                            <select class="form-control" name="to" id="to">
                                @foreach($users as $user)
                                    <option value='{{$user->id}}'>{{$user->name}}: {{$user->email}}</option>
                                @endforeach
                            </select>
                          </div> 
                          <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" aria-describedby="" placeholder="" >
                          </div>
                           <div class="form-group">
                            <label for="message">Message</label>
                            <input type="text" class="form-control" id="message" name="message" aria-describedby="" placeholder="">
                          </div>
                          <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
