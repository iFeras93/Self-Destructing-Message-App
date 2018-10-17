<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('read_message');
    }

    /*
     * To show form
     */
    public function add_new_message_show_form()
    {
        // return add new message form
        return view('messages.add');
    }

    /**
     * @param Request $request
     *
     * this post function to create new message in database
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_new_message_post_form(Request $request)
    {

        //This for validate the inputs
        $validator = \Validator::make($request->all(), [
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:3|max:1000'
        ]);

        /*
         * if statement for check the validation inputs
         */
        if ($validator->fails()) {

            // return error message
            return redirect()->back()->with(['status' => $validator->errors()->first()])->withInput($request->all());

        } else {
            // init message object
            $message = new Message();
            // passing value to object
            $message->hash = md5(uniqid(true));
            $message->title = $request->input('title');
            $message->content = $request->input('content');
            $message->user_id = $request->user()->id;

            //save object in database
            $message->save();

            return redirect('/home')->with(['status' => 'message create successfully']);
        }
    }

    public function read_message($hash)
    {
        // get message using hash on link
        $message = Message::where('hash', $hash)->first();

        // check if not find message
        if (!$message)
            return view('messages.no_message');

        // passing message values to new variables
        $title = $message->title;
        $content = $message->content;

        // delete message
        // this operation processing after passing values :) so no problem with it.
        // so the message show to one time only
        $message->delete();

        return view('messages.read', compact(['title', 'content']));
    }
}
