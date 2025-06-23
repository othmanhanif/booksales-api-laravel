<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // ✅ ADMIN only (middleware jaga role)
    public function index()
    {
        return response()->json(Transaction::with(['user', 'book'])->get());
    }

    // ✅ CUSTOMER only
    public function store(Request $request)
    {
        if ($request->user()->role !== 'customer') {
            return response()->json(['message' => 'Unauthorized. Customer only.'], 403);
        }

        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $transaction = Transaction::create([
            'user_id' => $request->user()->id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'transaction_date' => now(), // ✅ DITAMBAHKAN
            'status' => 'pending' // Tambahkan ini
        ]);

        return response()->json($transaction, 201);
    }

    // ✅ CUSTOMER only (lihat hanya miliknya)
    public function show(Request $request, $id)
    {
        if ($request->user()->role !== 'customer') {
            return response()->json(['message' => 'Unauthorized. Customer only.'], 403);
        }

        $transaction = Transaction::with('book')
            ->where('user_id', $request->user()->id)
            ->find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found or unauthorized'], 404);
        }

        return response()->json($transaction);
    }

    // ✅ CUSTOMER only (edit milik sendiri)
    public function update(Request $request, $id)
    {
        if ($request->user()->role !== 'customer') {
            return response()->json(['message' => 'Unauthorized. Customer only.'], 403);
        }

        $transaction = Transaction::where('user_id', $request->user()->id)->find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found or unauthorized'], 404);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $transaction->update([
            'quantity' => $request->quantity,
        ]);

        return response()->json($transaction);
    }

    // ✅ ADMIN only (middleware jaga role)
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->delete();
        return response()->json(['message' => 'Transaction deleted successfully']);
    }
}