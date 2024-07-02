<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function(){
//     return view('welcome');
// });

Route::get('/', [welcomeController::class, 'welcome'])->name('welcome');

// Route::get('/notes', [NoteController::class, 'index'])->name('note');
// Route::get('/notes/create', [NoteController::class, 'create'])->name('note.create');
// Route::post('/notes', [NoteController::class, 'store'])->name('note.store');
// Route::get('/notes/{id}', [NoteController::class, 'show'])->name('note.show');
// Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
// Route::put('/notes/{id}', [NoteController::class, 'update'])->name('note.update');
// Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('note.destroy');
  
Route::resource('notes', NoteController::class);

Route::delete('/file/delete/{id}', [FileController::class, 'destroy'])->name('file.delete');