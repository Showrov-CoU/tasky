<x-layout>
    <div class="note-container single-note">
        <h1>Edit your note</h1>
        <form action="{{ route('notes.update', $note) }}" method="POST" class="note">
            @csrf
            @method('PUT')
            <textarea name="note" class="note-body" cols="30" rows="10" placeholder="Enter your note here">{{ $note->note }}</textarea>

            <div class="note-buttons">
                <a href="{{ route('notes.index') }}" class="note-edit-button">Cancel</a>
                <button class="note-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x-layout>
