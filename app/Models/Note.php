<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['note','image','user_id'];

    public function files(){
        return $this->hasMany(NoteFile::class);
    }
}
