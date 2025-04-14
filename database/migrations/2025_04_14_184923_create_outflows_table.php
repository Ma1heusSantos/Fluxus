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
        Schema::create('outflows', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('value');
            $table->enum('method',['pix','cartão','cheque','dinheiro']);
            $table->unsignedBigInteger('desk_id');

            $table->foreign('desk_id')->references('id')->on('desks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outflows');
    }
};