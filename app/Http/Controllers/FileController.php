<?php

namespace App\Http\Controllers;

use App\Models\NoteFile;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //
   
    public function destroy($id)
    {
        
        $file = NoteFile::findOrFail($id);
        // dd(public_path($file->file_path));
        if(file_exists(public_path($file->file_path))){
        //    dd("$file->file_path");
          unlink(public_path($file->file_path));
        } else{
            dd('File does not exists.');
        }
        $file->delete();

      

        return to_route('notes.show', $file->note_id)->with('message', 'Note deleted successfully');
        //dd($file);
    }
}
