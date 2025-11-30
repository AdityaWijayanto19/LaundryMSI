<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Halaman Dashboard Utama
    public function index(Request $request)
    {
        // 1. Ambil Data dengan Filter Sederhana
        $query = Transaction::latest();

        if ($request->has('search')) {
            $query->where('customer_name', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('status') && $request->status != 'all') {
            $query->where('payment_status', $request->status);
        }

        $transactions = $query->paginate(10)->withQueryString();

        // 2. Hitung Statistik Sederhana
        $todayIncome = Transaction::whereDate('transaction_date', today())->sum('total_price');
        $totalUnpaid = Transaction::where('payment_status', 'unpaid')->count();
        $todayCount  = Transaction::whereDate('transaction_date', today())->count();

        return view('dashboard', compact('transactions', 'todayIncome', 'totalUnpaid', 'todayCount'));
    }

    // Simpan Transaksi Baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_date' => 'required|date',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'service_type' => 'required',
            'package_name' => 'required',
            'qty' => 'required|numeric|min:0.1',
            'unit' => 'required',
            'price_per_unit' => 'required|numeric',
            'total_price' => 'required|numeric',
            'payment_method' => 'required',
            'payment_status' => 'required',
            'notes' => 'nullable|string'
        ]);

        Transaction::create($validated);

        return redirect()->back()->with('success', 'Transaksi berhasil dicatat!');
    }

    // Update Status Bayar (Lunas/Belum) - Fitur Cepat
    public function updateStatus($id)
    {
        $trx = Transaction::findOrFail($id);
        // Toggle status
        $trx->payment_status = ($trx->payment_status == 'unpaid') ? 'paid' : 'unpaid';
        $trx->save();

        return redirect()->back()->with('success', 'Status pembayaran diperbarui.');
    }
    
    // Hapus Transaksi
    public function destroy($id)
    {
        Transaction::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data dihapus.');
    }
} 