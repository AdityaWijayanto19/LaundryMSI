<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('transaction_date');
            $table->string('customer_name');
            $table->string('customer_phone')->nullable(); // No WA
            
            // Data Layanan
            $table->string('service_type'); // Toko / Delivery
            $table->string('package_name'); // Cuci Kering, Setrika, dll
            
            // Perhitungan
            $table->decimal('qty', 8, 2); // Bisa koma (misal 2.5 Kg)
            $table->string('unit'); // kg / pcs
            $table->decimal('price_per_unit', 10, 0);
            $table->decimal('total_price', 12, 0);
            
            // Pembayaran
            $table->enum('payment_method', ['cash_courier', 'digital']);
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
            
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};