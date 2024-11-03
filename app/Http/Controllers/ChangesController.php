<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Changes;
use DB;

class ChangesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all from database
        // return Changes::all();
        // $changes = Changes::with('words')->get();
        $changes = Changes::join('words', 'words.id', '=', 'changes.word_id')
        ->get([
            'changes.id',
            'changes.word_id',
            'words.word_sydsamiska',
            'changes.message',
            'changes.name',
            'changes.email',
            'changes.telephone',
            'changes.status',
            'changes.checked_by',
            'changes.created_at',
            'changes.updated_at'
            ]);

        // return $data;

        return response()->json($changes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'word_id',
            'message',
            'name',
            'email',
            'telephone',
            'status',
            'checked_by'
        ]);
        return Changes::create($request->all());
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $change = Changes::find($id);
        if($change != null) {
            return $change;
        } else {
            return response()->json([
                'No item matching this search term was found.'
            ], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $change = Changes::find($id);
        if($change != null) {
           $change->update($request->all());
           return $change;
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
        $change = Changes::find($id);
        if($change != null) {
           $change->delete();
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
