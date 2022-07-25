<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giftcards', function (Blueprint $table) {
            $table->id();
            $table->string('cat');
            $table->string('sub_cat');
            $table->integer('user_id');
            $table->string('payment_method');
            $table->double('giftcard_amt');
            $table->double('calculated_amount');
            $table->integer('file')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->default('Waiting Approval');
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
        Schema::dropIfExists('giftcards');
    }
}
