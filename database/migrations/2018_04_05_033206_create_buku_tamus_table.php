<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuTamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_tamus', function (Blueprint $table) {
            $table->increments('id_bukutamu');
            $table->string('nama');
            $table->bigInteger('nik')->unsigned();
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nomor_telepon');
            $table->string('instansi');
            $table->text('keterangan');
            $table->date('tanggal');
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
        Schema::dropIfExists('buku_tamus');
    }
}
