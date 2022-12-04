<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('item_details');
            $table->string('availability');
            $table->string('status')->nullable();
            $table->string('condition')->nullable();
            $table->string('comments')->nullable();
            $table->string('user_id');
            $table->string('store_id');
            $table->string('today_date');
            $table->string('store_serial');
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
        Schema::dropIfExists('facilities');
    }
}
