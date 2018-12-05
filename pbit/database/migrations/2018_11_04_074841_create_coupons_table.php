<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('promotion_code');
            $table->enum('type',['percentage','fixed_amount'])->default('fixed_amount');
            $table->float('value')->default(0);
            $table->string('apply_on',255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('number_of_user')->nullable();
            $table->integer('max_usage')->default(1);
            $table->boolean('apply_once')->default(true);
            $table->boolean('existing_clients_only')->default(false);
            $table->boolean('new_signups_only')->default(false);

            $table->integer('applied_coupons')->nullable();
            $table->LongText('note')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
