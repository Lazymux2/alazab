<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoreitems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moreitems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('desc');
            $table->float('price');
            $table->json('imgs');
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');
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
        Schema::dropIfExists('moreitems');
    }
}
