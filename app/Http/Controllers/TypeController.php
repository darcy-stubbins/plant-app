<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Shows the types 
     */
    public function index()
    {
        //
    }

    /**
     * Shows all the tagged types  
     */
    public function taggedTypes(int $id)
    {
        //pass the tags into the view 
        $tag = Tag::find($id);

        $tagIdImLookingFor = $id;

        //loops through all the types, checks their tags and returns the tags id if it matches $tagIdImLookingFor
        $types = Type::all()
            ->filter(function (Type $value, int $key) use ($tagIdImLookingFor) {
                return $value->tags->pluck('id')->contains($tagIdImLookingFor);
            });

        return view('types.filteredIndex')->with(['types' => $types, 'tag' => $tag]);
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
