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
        Schema::create('orderlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->string("product_name");
            $table->double("price",15,3);
            $table->double("qte",15,0);
            $table->unsignedBigInteger("order_id");
            $table->foreign("order_id")->references("id")->on("orders");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderlines');
    }
};
