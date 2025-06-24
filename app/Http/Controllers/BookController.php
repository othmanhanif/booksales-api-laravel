<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    // Menampilkan semua buku
    public function index()
    {
        $books = Book::with('author')->get();

        return response()->json([
            'status' => 'success',
            'data' => $books
        ], 200);
    }

    // Menampilkan detail buku berdasarkan ID
    public function show($id)
    {
        $book = Book::with('author')->find($id);

        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $book
        ], 200);
    }
}