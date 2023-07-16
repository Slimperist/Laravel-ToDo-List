<h1>Create Tag</h1>

<form method="POST" action="{{ route('tags.store') }}">
    @csrf
    <div>
        <label for="name">Tag Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <button type="submit">Create</button>
</form>
