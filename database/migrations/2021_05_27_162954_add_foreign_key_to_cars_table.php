<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->bigInteger('customer_id')->nullable()->unsigned();
            // $table->foreignId('customer_id')->constrained('customers');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                    ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign('cars_customer_id_foreign'); 
        });
        Schema::drop('cars');
    }
}
