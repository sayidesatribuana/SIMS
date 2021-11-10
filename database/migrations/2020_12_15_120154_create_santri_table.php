<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->id();
            $table->string('nomorinduk');
            $table->string('namasantri');
            $table->string('jeniskelamin');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('alamat');
            $table->string('nomorhp');
            $table->string('kelas');
            $table->string('tahunajaran');
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
        Schema::dropIfExists('santri');
    }
}
