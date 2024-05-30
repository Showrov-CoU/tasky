<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $notes = Note::query()->orderBy('created_at', 'desc')->get(); 
        return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
           'note' => ['required', 'string']
        ]);

        $data['user_id'] = 1;

        $note = Note::create($data);
        
        return to_route('notes.show', $note)->with('message', 'Note create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $note = Note::find($id);
        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $note = Note::find($id);
        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $data = $request->validate([
           'note' => ['required', 'string']
        ]);
        // dump($data);

        $note = Note::findOrFail($id);
        // dump($note);

        $note->update($data);
        // dd($note);
        
        return to_route('notes.show', $note)->with('message', 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        //dump($id);
       
     
        $note = Note::findOrFail($id);
        $note->delete();

        return to_route('notes.index')->with('message', 'Note deleted successfully');
        
    }
}
