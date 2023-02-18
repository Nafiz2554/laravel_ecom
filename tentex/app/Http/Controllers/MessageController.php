<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Message;

class MessageController extends Controller
{
    //Sending Message

    public function store_message(Request $request)
    {
        $message = new Message;
        $message->id = $request->message; 
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->issue = $request->issue;

        $message->save();
        return redirect()->back()->with('message', 'Message Successfully Sent');
    }



    public function show_message()
    {
        $messages = Message::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.message.index', compact('messages'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }


    public function delete_message(Message $messages)
    {
        $delete = $messages->delete();
        if ($delete) {
            return redirect()->back()->with('message', 'Message deleted successfully');
        }
    }


}
