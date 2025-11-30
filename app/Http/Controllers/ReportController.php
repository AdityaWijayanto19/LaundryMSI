<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // 1. Setup Tanggal
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // 2. Query Pendapatan (Hanya yang LUNAS / Paid)
        
        // A. Hari Ini
        $incomeToday = Transaction::where('payment_status', 'paid')
            ->whereDate('transaction_date', Carbon::today())
            ->sum('total_price');

        // B. Bulan Ini
        $incomeMonth = Transaction::where('payment_status', 'paid')
            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->sum('total_price');

        // C. Total Transaksi (Jumlah Nota) Bulan Ini
        $trxCountMonth = Transaction::whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
            ->count();

        // 3. Persiapan Data Grafik (Pendapatan Harian selama Bulan Ini)
        // Kita butuh array tanggal 1 s/d 30/31 beserta total pendapatannya
        
        $chartDates = [];
        $chartIncomes = [];
        
        // Loop dari tanggal 1 sampai akhir bulan ini
        for ($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addDay()) {
            
            // Format label tanggal (misal: "01 Okt")
            $chartDates[] = $date->format('d M');
            
            // Ambil sum total_price di tanggal tersebut (status paid)
            $sum = Transaction::where('payment_status', 'paid')
                ->whereDate('transaction_date', $date)
                ->sum('total_price');
                
            $chartIncomes[] = $sum;
        }

        return view('reports', compact(
            'incomeToday', 
            'incomeMonth', 
            'trxCountMonth', 
            'chartDates', 
            'chartIncomes'
        ));
    }
}