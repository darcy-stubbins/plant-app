<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //getting all the types and shuffle them
        $types = Type::all()->shuffle();

        //get all the tags to pass into the homepage for the taggedTypes function in TypeController
        $tags = Tag::all();

        return view('home')->with(['types' => $types, 'tags' => $tags]);
    }
}
