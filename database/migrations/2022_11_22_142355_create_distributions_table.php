<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->id();
            $table->string('account_name')->nullable();
            $table->string('account_phone')->nullable();
            $table->string('account_email')->nullable();
            $table->string('account_address')->nullable();
            $table->string('account_birthday')->nullable();
            $table->string('location')->nullable();
            $table->string('account_type')->nullable();
            $table->string('date')->nullable();
            $table->string('product_detail')->nullable();
            $table->string('status')->nullable();
            $table->string('product')->nullable();
            $table->string('price')->nullable();
            $table->string('unit')->nullable();
            $table->string('amount')->nullable();
            $table->string('sales_unit')->nullable();
            $table->string('user_id')->nullable();
            $table->string('store_serial')->nullable();
            $table->string('sold_by')->nullable();
            $table->string('store_code')->nullable();
            $table->string('today_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distributions');
    }
}
