<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota');
            $table->date('tgl_pinjaman');
            $table->integer('besar_pinjaman');
            $table->float('bagi_hasil');
            $table->char('jangka_waktu', 2);
            $table->integer('bayar_pokok');
            $table->integer('hasil_bagi');
            $table->integer('bayar_perbulan');
            $table->integer('total');
            $table->string('keterangan');
            $table->unsignedBigInteger('user_id'); // Foreign key to link to users table
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjamans');
    }
}
