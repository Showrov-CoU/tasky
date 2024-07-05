@extends('layout.auth')
@section('slot')
    <div class="note-container single-note">
        <h1 class="text-2xl font-bold">Create new note</h1>
        <form enctype="multipart/form-data" action="{{ route('notes.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="flex justify-start items-start gap-2">
                <label for="note" class="pt-2 text-lg font-semibold">Note:</label>
                <textarea class="p-2 border-2 text-black" name="note" class="note-body" cols="110" rows="5"
                    placeholder="Type your note here....."></textarea>
            </div>

            <div>
                <label for="image" class="pt-2 text-lg font-semibold">Image:</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <p class="text-red-600"> {{ $errors->first('image') }} </p>
                @enderror
            </div>
            <div>
                <label for="image" class="pt-2 text-lg font-semibold">Files:</label>
                <input type="file" name="files[]" id="file" multiple>
            </div>


            <a href="{{ route('notes.index') }}"
                class="note-edit-button px-5 py-2 text-white bg-[#006bd6] font-bold rounded-md text-base">Cancel</a>
            <button class="note-submit-button px-5 py-2 text-white bg-[#a82f2f] font-bold rounded-md text-base"
                style="font-family: 'Caveat', cursive; ">Submit</button>

        </form>
    </div>
@endsection
