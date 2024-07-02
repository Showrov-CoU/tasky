<x-layout>

    <div class="note-container single-note flex justify-start">
        <div class="w-[62%]">
            <div class="note-header">
                {{-- @dump($note); --}}
                {{-- @dump($note_files); --}}
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
        <div class="bg-white text-stone-950 w-[38%] p-2">
            <p class="font-bold text-2xl">Associated Files</p>

            <div class="mt-2">
                @if ($note_files->isNotEmpty())
                    <ol class="">
                        @foreach ($note_files as $file)
                            {{-- $sanitizeName = $file->file_path; --}}
                            {{-- @dump($file); --}}
                            <li class="flex gap-2">
                                <a href="{{ asset($file->file_path) }}" target="_blank"
                                    class="ext-blue-500 hover:text-blue-700 underline">{{ str_replace('files/', '', $file->file_path) }}</a>
                                <form action="{{ route('file.delete', $file->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="">
                                        <i class="fa-solid fa-trash text-red-500 hover:text-red-800"></i>
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <p>No files uploaded for this note.</p>
                @endif
            </div>

        </div>
    </div>
</x-layout>
