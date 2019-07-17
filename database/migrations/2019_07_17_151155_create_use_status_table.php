<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->boolean('follow_status');
            $table->boolean('favorite_status');
            $table->boolean('booking_status');
            $table->date('follow_at');
            $table->date('favorite_at');
            $table->date('booking_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('use_status');
    }
}
