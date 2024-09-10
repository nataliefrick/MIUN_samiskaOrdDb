<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Words;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all from database
        return Words::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'word_sydsamiska',
            'definition_sydsamiska',
            'word_svenska',
            'definition_svenska',
            'synonyms',
            'antonyms',
            'example_of_use',
            'link_to_update',
            'sources',
            'arousal_level',
            'frequency_id'
        ]);
        return Area::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $word = Words::find($id);
        if($word != null) {
            return $word;
        } else {
            return response()->json([
                'Ordet hittades inte i databasen.'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $word = Words::find($id);
        if($word != null) {
           $word->update($request->all());
           return $word;
        } else {
            return response()->json([
                'Ordet hittades inte i databasen.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $word = Words::find($id);
        if($word != null) {
           $word->delete();
           return response()->json([
            'Ordet raderade.'
            ]);
        } else {
            return response()->json([
                'Ordet hittades inte i databasen.'
            ], 404);
        }
    }
}
