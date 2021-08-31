<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('c_city');
            $table->text('c_st');
            $table->text('c_loc');
            $table->boolean('statt');
            $table->text('c_message')->nullable(true);
            $table->integer('c_count');
            $table->bigInteger('moreitem_id')->unsigned();
            $table->foreign('moreitem_id')->references('id')->on('moreitems');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
            
            
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
        Schema::dropIfExists('orders');
    }
}
