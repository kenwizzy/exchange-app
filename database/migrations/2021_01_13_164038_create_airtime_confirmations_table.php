<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirtimeConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airtime_confirmations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('from');
            $table->string('network');
            $table->string('amount');
            $table->string('receive');
            $table->text('screenshot')->unique();
            $table->string('status')->default('Submitted');
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
        Schema::dropIfExists('airtime_confirmations');
    }
}
