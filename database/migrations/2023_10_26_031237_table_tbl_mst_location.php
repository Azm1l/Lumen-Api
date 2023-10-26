<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTblMstLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_master_location', function (Blueprint $table) {
            $table->increments('location_id');
            $table->string('location_name');
            $table->float('location_latitude');
            $table->float('location_longitude');
            $table->string('location_description');
            $table->string('location_address');
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
        Schema::dropIfExists('master_location');
    }
}
