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
        return Changes::all();
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
