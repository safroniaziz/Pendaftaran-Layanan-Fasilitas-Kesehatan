<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitra_id');
            $table->foreign('mitra_id')->references('id')->on('mitras');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('umur');
            $table->enum('jenis_kelamin',['L','P']);
            $table->text('keluhan');
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
        Schema::dropIfExists('pendaftars');
    }
};
