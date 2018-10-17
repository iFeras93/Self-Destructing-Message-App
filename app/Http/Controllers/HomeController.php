<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // This for get messages list added by specific user
        // Feras Shaer
        $messages = Message::where('user_id', \Auth::user()->id)->get();


        return view('home', compact(['messages']));

    }


}
