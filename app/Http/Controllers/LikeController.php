<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //create a like 
    public function toggleLike(Request $request)
    {
        $typeId = $request->input('type_id');
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)->where('type_id', $typeId)->get();

        if ($like->isEmpty()) {
            $like = new Like();
            $like->type_id = $typeId;
            $like->user_id = $user->id;

            $like->save();
        } else {

            Like::where('user_id', $user->id)->where('type_id', $typeId)->delete();
        }

        return back();
    }
}
