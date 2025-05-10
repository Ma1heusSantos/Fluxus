<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('entries', function (Blueprint $table) {
        $table->unsignedBigInteger('method_id')->after('value')->nullable();

        $table->foreign('method_id')
              ->references('id')
              ->on('method_payments'); 
    });
}

public function down()
{
    Schema::table('entries', function (Blueprint $table) {
        $table->dropForeign(['method_id']);
        $table->dropColumn('method_id');
    });
}

};