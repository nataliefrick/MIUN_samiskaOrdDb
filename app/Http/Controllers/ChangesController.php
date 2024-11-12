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

    public function getLastThreeEntries()
    {
        // Fetch the last 3 entries by order of creation date
        $lastThreeEntries = Changes::join('words', 'words.id', '=', 'changes.word_id')
        ->orderBy('changes.created_at', 'desc')
        ->take(3)
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

        // Return the entries as a JSON response
        return response()->json($lastThreeEntries);
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
                'show: No item matching this search term was found.'
            ], 404);
        }
    }

    public function filterText($searchTerm) {
        $changes = Changes::join('words', 'words.id', '=', 'changes.word_id')
        ->where(DB::raw('LOWER(words.word_sydsamiska)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->orWhere(DB::raw('LOWER(changes.message)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->orWhere(DB::raw('LOWER(changes.name)'), 'like',  '%' . strtolower($searchTerm) . '%')
        ->take(3)
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
                  
        if ($changes == null) {
            return response()->json([
                'filter: No item matching this search term was found.'
            ], 404);
        }

        return $changes;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);

        // Validate the incoming request
        $validatedData = $request->validate([
            'word_id' => 'exists:words,id',
            'message' => 'string|max:255',
            'name' => 'string|max:50|nullable',
            'email' => 'email|max:50|nullable',
            'telephone' => 'string|max:15|nullable',
            'status' => 'string|max:255|nullable',
            'checked_by' => 'string|max:50|nullable',
        ]);

        $change = Changes::find($id);
        if($change != null) {
        //    $change->update($request->all());
        
        // update the change record
        $change->fill($validatedData);
        
        // Check if data is changing
        if ($change->isDirty()) {
            $change->save();
            
            return response()->json([
                'message' => 'Change updated successfully',
                'data' => $change,
            ]);
        }

        return response()->json([
            'message' => 'No changes made to the change record.',
            'data' => $change,
    
        ]);
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

    /**
     * Update specific fields of a change.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function patch(Request $request, $id)
        {
            // Find the change record by ID
            $change = Change::find($id);

            if (!$change) {
                return response()->json(['error' => 'Change not found.'], 404);
            }

            // Validate only the fields that are sent in the request
            $validatedData = $request->validate([
                'word_id' => 'exists:words,id',
                'message' => 'string|max:255',
                'name' => 'string|max:50|nullable',
                'email' => 'email|max:50|nullable',
                'telephone' => 'string|max:15|nullable',
                'status' => 'integer|nullable',
                'checked_by' => 'string|max:50|nullable'
            ]);

            // Update only the fields that were provided in the request
            $change->fill($validatedData);
            $change->save();

            return response()->json([
                'message' => 'Change updated successfully',
                'data' => $change,
            ]);
        }

}
