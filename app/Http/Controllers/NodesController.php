<?php

namespace App\Http\Controllers;

use App\Models\Nodes;
use Illuminate\Http\Request;
use DB;

class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all from database
        return Nodes::all();
    }

    public function getPolarityNodes($searchTerm) {
        $nodes = Nodes::where(DB::raw('LOWER(polarity_node)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->get();

    if ($nodes->isEmpty()) {
        return response()->json([
            'message' => 'No items matching this search term were found.'
        ], 404);
    }

    return response()->json($nodes);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'main_node' => 'required|string|max:255',
            'polarity_node' => 'nullable|string|max:255',
            'sub_node' => 'nullable|string|max:255',
        ]);
        return Nodes::create($validated);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Nodes $nodes)
    {
        $node = Nodes::find($id);
        if($node != null) {
            return $node;
        } else {
            return response()->json([
                'show No item matching this search term was found.'
            ], 404);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nodes $nodes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nodes $nodes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nodes $nodes)
    {
        //
    }
}
