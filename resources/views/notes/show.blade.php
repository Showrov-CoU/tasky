<x-layout>

    <div class="note-container single-note">
        <div class="note-header">
            <h1>Note: {{ $note->created_at }}</h1>
            <div class="note-buttons">
                <a href="{{ route('notes.edit', $note) }}" class="note-edit-button">Edit</a>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>
            </div>
        </div>
        <div>
            <img src="{{ asset('image/' . $note->image) }}" alt="">
        </div>
        <div class="note">
            <div class="note-body">{{ $note->note }}</div>
        </div>
    </div>
</x-layout>
