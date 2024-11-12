<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Downloads;
use DB;

class DownloadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all from database
        return Downloads::all();
    }

    public function getLastThreeEntries()
    {
        // Fetch the last 3 entries by order of creation date
        $lastThreeEntries = Downloads::orderBy('created_at', 'desc')->take(3)->get();

        // Return the entries as a JSON response
        return response()->json($lastThreeEntries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'name',
            'title',
            'institution',
            'email',
            'telephone',
            'projectTitle',
            'description',
            'searchTerm',
            'notes'
        ]);
        return Downloads::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $download = Downloads::find($id);
        if($download != null) {
            return $download;
        } else {
            return response()->json([
                'No item matching this search term was found.'
            ], 404);
        }
    }

    public function filterText($searchTerm) {

        $downloads = Downloads::where(DB::raw('LOWER(name)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->orWhere(DB::raw('LOWER(title)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->orWhere(DB::raw('LOWER(institution)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->orWhere(DB::raw('LOWER(projectTitle)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->orWhere(DB::raw('LOWER(description)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->orWhere(DB::raw('LOWER(searchTerm)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->orWhere(DB::raw('LOWER(notes)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->get();
                
        if ($downloads == null) {
            return response()->json([
                'filtertext No item matching this search term was found.'
            ], 404);
        }

        return $downloads;
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $downloads = Downloads::find($id);
        if($downloads != null) {
           $downloads->update($request->all());
           return $downloads;
        } else {
            return response()->json([
                'No item matching this search term was found.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $downloads = Downloads::find($id);
        if($downloads != null) {
           $downloads->delete();
           return response()->json([
            'Data deleted.'
            ]);
        } else {
            return response()->json([
                'No item matching this search term was found.'
            ], 404);
        }
    }
}
