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
        Schema::create('penilaian_alternatifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelamar_id');
            $table->foreign('pelamar_id')->references('id')->on('pelamars')->noActionOnDelete();
            $table->unsignedBigInteger('kriteria_id');
            $table->foreign('kriteria_id')->references('id')->on('kriterias')->noActionOnDelete();
            $table->float('nilai');
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
        Schema::dropIfExists('penilaian_alternatifs');
    }
};
