<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $typeId = $request->input('type_id');

        $user = Auth::user();

        $like = new Like();
        $like->type_id = $typeId;
        $like->user_id = $user->id;

        $like->save();

        return back();
    }

    public function destroy()
    {
        //
    }
}
