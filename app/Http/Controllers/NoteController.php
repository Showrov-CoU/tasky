<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteFile;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //dump(auth()->user()->name);
        $notes = Note::latest()->paginate(3);

    
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

        $data = $request->validate([
           'note' => ['required', 'string'],
           'image' => ['required', 'image' , 'mimes:jpeg,png,jpg,gif'],
        ],['image.required' => 'Please upload an image']);

        $imageName = time().'.'.$request->image->extension();
       

        $request->image->move(public_path('image'), $imageName);
        // dd(public_path());

        $data['image'] = $imageName;
        $data['user_id'] = 1;

        $note = Note::create($data);

        if($request->hasFile('files')){
            // dd($request->file('files'));
            foreach($request->file('files') as $file){
                $fileName = time().'.'.$file->getClientOriginalName();
                $file->move(public_path('files'), $fileName);

                NoteFile::create([
                    'note_id' => $note->id,
                    'file_path' => 'files/' . $fileName
                ]);
            }
            
        }
        
        return to_route('notes.show', $note)->with('message', 'Note create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $note = Note::find($id);
        $note_files = NoteFile::where('note_id', $id)->get();
        return view('notes.show', ['note' => $note, 'note_files' => $note_files]);
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
      
        dd($data);

        $note = Note::findOrFail($id);
        //dump($note);

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
        //dd($id);
       
     
        $note = Note::findOrFail($id);
        $note->delete();

        return to_route('notes.index')->with('message', 'Note deleted successfully');
        
    }
}
