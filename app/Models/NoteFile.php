<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteFile extends Model
{
    use HasFactory;

    protected $table = 'multiple_files';

    protected $fillable = ['note_id', 'file_path'];

    public function note(){
        return $this->belongsTo(Note::class);
    }

}
