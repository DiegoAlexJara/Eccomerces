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
        Schema::create('_producto', function (Blueprint $table) {
            $table->id();

            $table->text('Name');
            $table->longText('description');
            $table->float('price', 8, 2);
            $table->unsignedBigInteger('category_id'); 
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('marca_id');  
            

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategory')->onDelete('cascade');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_producto');
    }
};
