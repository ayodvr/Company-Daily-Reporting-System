<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retails', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('dob')->nullable();
            $table->string('invoice')->nullable();
            $table->string('product')->nullable();
            $table->string('unit')->nullable();
            $table->string('store')->nullable();
            $table->string('customer')->nullable();
            $table->string('address')->nullable();
            $table->string('payment')->nullable();
            $table->string('confirm')->nullable();
            $table->string('amount')->nullable();
            $table->string('visited')->nullable();
            $table->string('found')->nullable();
            $table->string('cash_hand')->nullable();
            $table->string('cash_bank')->nullable();
            $table->string('bank_paid')->nullable();
            $table->string('payslips')->nullable();
            // $table->string('pro_details')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('qty_sold')->nullable();
            $table->string('sys_qty')->nullable();
            $table->string('phy_qty')->nullable();
            $table->string('inv_paid')->nullable();
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
        Schema::dropIfExists('retails');
    }
}
