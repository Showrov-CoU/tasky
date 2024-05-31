<x-layout>
    <div class="note-container py">
        {{-- <a href="{{ route('notes.create') }}" class="new-note-btn">Create New Note</a> --}}

        <div class="notes">
            {{-- @dd(public_path()) --}}

            @foreach ($notes as $note)
                <div class="note">
                    <div class="h-48">
                        @if ($note->image)
                            <img class="h-full" src="{{ asset('image/' . $note->image) }}" alt="note_img">
                        @else
                            <img class="h-full" src="{{ asset('image/ph.png') }}" alt="">
                        @endif

                    </div>
                    <div class="note-body">
                        <p>{{ Str::limit($note->note, 20) }}</p>
                    </div>
                    <div class="note-buttons">
                        <a href="{{ route('notes.show', $note) }}" class="note-edit-button">View</a>
                        <a href="{{ route('notes.edit', $note) }}" class="note-submit-button">Edit</a>

                        <button onclick="test({{ $note->id }})" class="note-delete-button"
                            style="font-family: 'Caveat', cursive; ">
                            Delete
                        </button>

                        <form id='{{ 'deleteForm' . $note->id }}' action="{{ route('notes.destroy', $note->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <button onclick="deleteNote()" class="note-delete-button"
                                style="font-family: 'Caveat', cursive; ">Delete</button> --}}
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @section('script')
        <script lang="JS">
            function test(id) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm' + id).submit();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            }
        </script>
    @endsection
</x-layout>
