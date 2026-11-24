<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>

    <h1>Daftar Buku</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('books.create') }}">
        + Tambah Buku
    </a>

    <br><br>

    @if ($books->count() > 0)

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->description }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('books.destroy', $book->id) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Yakin ingin menghapus buku ini?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p>Belum ada data buku.</p>
    @endif

</body>
</html>