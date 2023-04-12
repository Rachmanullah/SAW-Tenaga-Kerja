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
        Schema::create('opsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_kriteria_id');
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriterias')->noActionOnDelete();
            $table->string('opsi');
            $table->integer('nilai_opsi');
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
        Schema::dropIfExists('opsis');
    }
};
