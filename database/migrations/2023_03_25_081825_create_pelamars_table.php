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
        Schema::create('pelamars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tmp_lahir');
            $table->string('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->integer('umur');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']);
            $table->enum('pendidikan_akhir', ['SMA', 'SMK', 'S1', 'S2', 'Lain']);
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
        Schema::dropIfExists('pelamars');
    }
};
