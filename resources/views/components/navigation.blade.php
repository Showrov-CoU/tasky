<nav class="note-container mt-4">
    <ul>
        <li><a href="{{ route('notes.index') }}" style="text-decoration:none; color:inherit; font-family:inherit">
                Home</a> </li>
        <li><a href="{{ route('notes.create') }}" style="text-decoration:none; color:inherit; font-family:inherit">Create
                New Note</a> </li>
        <a href="{{ route('logOut') }}" class="text-blue-600 hover:underline"> logout</a>
    </ul>
</nav>
