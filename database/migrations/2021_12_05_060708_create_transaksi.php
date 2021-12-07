<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penyedia_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->timestamp("accepted_at")->nullable();
            $table->timestamp("rejected_at")->nullable();
            $table->timestamp("wait_at")->nullable();
            $table->timestamp("wait_service_at")->nullable();
            $table->timestamp("already_at")->nullable();
            $table->timestamp("notyet_at")->nullable();
            $table->text('keterangan');
            $table->double('harga');
            $table->string('uuid');
            $table->timestamps();

            $table->foreign('penyedia_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
