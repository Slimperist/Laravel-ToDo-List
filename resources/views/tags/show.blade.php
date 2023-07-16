<h1>{{ $tag->name }}</h1>

<p>ID: {{ $tag->id }}</p>
<p>Name: {{ $tag->name }}</p>

<a href="{{ route('tags.edit', $tag) }}">Edit</a>

<form method="POST" action="{{ route('tags.destroy', $tag) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>
