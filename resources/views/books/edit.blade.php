<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>

    <h1>Edit Buku</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <br>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $book->title) }}"
            >
        </div>

        <br>

        <div>
            <label for="author">Author</label>
            <br>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author', $book->author) }}"
            >
        </div>

        <br>

        <div>
            <label for="description">Description</label>
            <br>
            <textarea
                id="description"
                name="description"
                rows="5"
                cols="40"
            >{{ old('description', $book->description) }}</textarea>
        </div>

        <br>

        <button type="submit">
            Update
        </button>

        <a href="{{ route('books.index') }}">
            Kembali
        </a>

    </form>

</body>
</html>