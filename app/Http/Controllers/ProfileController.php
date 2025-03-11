<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the index 
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource. (the current logged in user)
     */
    public function show()
    {
        $user = Auth::user();

        //getting the types with the likes, where the likes user_id matches the $user->id 
        $likedTypes = Type::whereHas('likes', function ($query) use ($user) {
            return $query->where('user_id', $user->id);
        })->get();

        return view('profile')->with(['user' => $user, 'likedTypes' => $likedTypes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
