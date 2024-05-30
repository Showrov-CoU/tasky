<x-layout>
    <div class="note-container single-note">
        <h1>Create new note</h1>
        <form action="{{ route('notes.store') }}" method="POST" class="note">
            @csrf
            <textarea name="note" class="note-body" cols="30" rows="10" placeholder="Enter your note here"></textarea>

            <div class="note-buttons">
                <a href="{{ route('notes.index') }}" class="note-edit-button">Cancel</a>
                <button class="note-submit-button" style="font-family: 'Caveat', cursive; ">Submit</button>
            </div>
        </form>
    </div>

</x-layout>
