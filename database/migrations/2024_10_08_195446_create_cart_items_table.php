<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id'); // Clave foránea a la tabla de productos
            $table->integer('quantity'); // Cantidad de productos

            $table->timestamps();

            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade'); // Relación con la tabla 'carts'
            $table->foreign('product_id')->references('id')->on('producto')->onDelete('cascade'); // Relación con la tabla 'productos'

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts_items');
    }
};
