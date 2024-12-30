<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarPinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar_pinjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pinjaman')->constrained('pinjamans')->onDelete('cascade');
            $table->date('jatuh_tempo');
            $table->date('tanggal_bayar')->nullable();
            $table->integer('nominal')->nullable();
            $table->integer('denda')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('bayar_pinjaman');
    }
}
