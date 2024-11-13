<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Words;
use DB;

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
        return Words::create($request->all());
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
                'show No item matching this search term was found.'
            ], 404);
        }
    }

    public function getLastThreeEntries()
    {
        // Fetch the last 3 entries by order of creation date
        $lastThreeEntries = Words::orderByRaw('GREATEST(created_at, updated_at) DESC')->take(3)->get();

        // Return the entries as a JSON response
        return response()->json($lastThreeEntries);
    }

    public function filterText($searchTerm) {

        $words = Words::where(DB::raw('LOWER(word_sydsamiska)'), 'like',  '%' . strtolower($searchTerm) . '%')->orWhere(DB::raw('LOWER(word_svenska)'), 'like',  '%' . strtolower($searchTerm) . '%')->orWhere(DB::raw('LOWER(word_norska)'), 'like',  '%' . strtolower($searchTerm) . '%')->get();
                
        if ($words == null) {
            return response()->json([
                'filtertext No item matching this search term was found.'
            ], 404);
        }

        return $words;
    }

    public function searchText($searchTerm) {

        $words = Words::where(DB::raw('LOWER(word_sydsamiska)'), 'like',  '%' . strtolower($searchTerm) . '%')->orWhere(DB::raw('LOWER(word_svenska)'), 'like',  '%' . strtolower($searchTerm) . '%')->orWhere(DB::raw('LOWER(word_norska)'), 'like',  '%' . strtolower($searchTerm) . '%')->orWhere(DB::raw('LOWER(synonyms)'), 'like',  '%' . strtolower($searchTerm) . '%')->orWhere(DB::raw('LOWER(antonyms)'), 'like',  '%' . strtolower($searchTerm) . '%')->get();
                
        if ($words == null) {
            return response()->json([
                'searchtext No item matching this search term was found.'
            ], 404);
        }

        return $words;
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
                'update No item matching this search term was found.'
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
            'Data deleted.'
            ]);
        } else {
            return response()->json([
                'destroy No item matching this search term was found.'
            ], 404);
        }
    }
}
