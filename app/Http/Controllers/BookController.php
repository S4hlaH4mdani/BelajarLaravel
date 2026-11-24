<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //menampilkan semua data buku
    public function index(){
        $books = Book::latest()->get();

        //return $books;
        return view('books.index', compact('books'));
    }

    //form tambah buku
    public function create(){
            return view('books.create');
    }

    //menyiapkan buku baru
    public function store(Request $request){
        $request->validate([
            'title' => 'required |max:255',
            'author' => 'required |max:255',
            'description' => 'nullable',
            ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil disimpan');
    }

    //menampilkan form edit buku
    public function edit($id){
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    //memperbarui data buku
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $book = Book::findOrFail($id);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
    }

    // menghapus data buku
    public function destroy($id){
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }
}