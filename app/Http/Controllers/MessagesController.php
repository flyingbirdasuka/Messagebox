<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    public function index(){
    	$messages = Message::with('userFrom')->where('user_id_to', Auth::id())->get();
    	return view('home')->with('messages', $messages);
    }

    public function create(){
    	$users = User::where('id', '!=', Auth::id())->get();
    	return view('create')->with('users', $users);
    }

    public function store(Request $request){
    	$message = new Message();
    	$message->user_id_from = Auth::id();
    	$message->user_id_to = $request->input('to');
    	$message->subject = $request->input('subject');
    	$message->body = $request->input('message');
    	$message->save();
    	return redirect()->to('home')->with('status', 'Message sent!');
    }	

    public function sent(){
    	$messages = Message::where('user_id_from', Auth::id())->get();
    	return view('sent')->with('messages', $messages);
    }

    public function read(int $id){
    	$message = Message::with('userFrom')->find($id);
    	$message->read = true;
    	$message->save();
    	return view('read')->with('message', $message);
    }

    public function reply(int $id, String $subject ){
    	$users = User::where('id', $id)->get();
    	$subject = 'Re: ' . $subject; 
    	return view('reply')->with(['users'=> $users, 'subject'=> $subject]);
    }

    public function delete(int $id){
    	$message = Message::find($id);
        $message->deleted = 1;
        $message->save();
        return redirect()->to('home')->with('status', 'Message deleted!');
    }

    public function deleted(){
    	$messages = Message::with('userFrom')->where('user_id_to', Auth::id())->get();
    	return view('deleted')->with('messages', $messages);
  
    }
}
