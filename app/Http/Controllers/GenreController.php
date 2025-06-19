<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        return Genre::create([
            'name' => $request->name
        ]);
    }
}