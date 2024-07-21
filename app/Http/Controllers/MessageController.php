<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){

        $message_data = Message::all();
        return view('dash.message.all', compact('message_data'));
    }


    public function store(Request $request){

        // $this->middleware(['auth', 'verified', 'dashAccess'])->except('dash.message.index', 'dash.message.store', 'dash.message.destroy');
        $rules =[
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:40',
            'subject' => 'required|string|max:50',
            'message' => 'required|string|max:350'
        ];


        $validate_data = $request->validate($rules);

        $message_data = Message::create($validate_data);

        // $message_data->update($message_data);

        // return redirect()->route('dash.message.index');

        return view('welcome');


    }

    public function destroy(Message $message){

        $message->delete();
        return to_route('dash.message.index');
    }
}
