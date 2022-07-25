<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_transaction_id')->nullable();
            $table->integer('giftcard_id')->nullable();
            $table->integer('user_id');
            $table->double('amount');
            $table->string('currency');
            $table->string('payment_method');
            $table->string('status');
            $table->string('payment_ref');
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
        Schema::dropIfExists('admin_transactions');
    }
}
