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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('name');
            $table->unsignedBigInteger('desk_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('id_desk_payment')->nullable();
            $table->date('date');
            $table->float('entry')->nullable();
            $table->integer('allotment');
            $table->date('expiration_data');
            $table->float('value');
            $table->string('product_name');
            $table->enum('status',['pago','pendente']);
            $table->timestamps();

            $table->foreign('desk_id')->references('id')->on('desks')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};