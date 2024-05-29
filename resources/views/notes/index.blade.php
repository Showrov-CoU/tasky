<x-layout>
    <div class="note-container py-12">
        <a href="{{ route('notes.create') }}" class="new-note-btn">Create New Note</a>

        <div class="notes">
            @foreach ($notes as $note)
                <div class="note">
                    <div class="note-body">
                        <p>{{ Str::words($note->note, 30) }}</p>
                    </div>
                    <div class="note-buttons">
                        <a href="{{ route('notes.show', $note) }}" class="note-edit-button">View</a>
                        <a href="{{ route('notes.edit', $note) }}" class="note-submit-button">Edit</a>
                        <button class="note-delete-button">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
