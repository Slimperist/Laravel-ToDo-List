<h1>Edit Tag</h1>

<form method="POST" action="{{ route('tags.update', $tag) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Tag Name:</label>
        <input type="text" id="name" name="name" value="{{ $tag->name }}" required>
    </div>

    <button type="submit">Update</button>
</form>
