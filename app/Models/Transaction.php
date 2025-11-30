<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     * (Opsional jika nama tabel jamak dari nama model, tapi ditulis biar jelas)
     */
    protected $table = 'transactions';

    /**
     * Kolom yang boleh diisi secara massal (Mass Assignment).
     * Sesuai dengan field di Controller dan Migration.
     */
    protected $fillable = [
        'transaction_date',
        'customer_name',
        'customer_phone',
        'service_type',
        'package_name',
        'qty',
        'unit',
        'price_per_unit',
        'total_price',
        'payment_method',
        'payment_status',
        'notes',
    ];

    /**
     * Casting tipe data otomatis.
     * Biar saat dipanggil di Blade, formatnya sudah sesuai.
     */
    protected $casts = [
        'transaction_date' => 'date',   // Biar jadi object Carbon (bisa format tanggal mudah)
        'total_price'      => 'integer', // Biar tidak ada desimal .00 saat diambil
        'qty'              => 'float',   // Biar angka 2.5 tetap terbaca desimal
    ];
}