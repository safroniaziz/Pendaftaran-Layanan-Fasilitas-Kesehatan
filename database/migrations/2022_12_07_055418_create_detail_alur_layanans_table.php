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
        Schema::create('detail_alur_layanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitra_id');
            $table->unsignedBigInteger('alur_layanan_id');
            $table->string('detail_alur_layanan');
            $table->timestamps();

            $table->foreign('alur_layanan_id')->references('id')->on('alur_layanans');
            $table->foreign('mitra_id')->references('id')->on('mitras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_alur_layanans');
    }
};
