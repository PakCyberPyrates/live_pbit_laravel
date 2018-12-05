<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempVideoLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_video_links', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->nullable(true);
            $table->string('video_name');
            $table->LongText('video_link');
            $table->date('expired_on',500)->nullable(true);
            $table->enum('video_type',['course','chapter','topic'])->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_video_links');
    }
}
