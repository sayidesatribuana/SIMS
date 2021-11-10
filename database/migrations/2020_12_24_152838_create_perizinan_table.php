<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerizinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perizinan', function (Blueprint $table) {
            $table->id();
            $table->string('santri_id');
            $table->string('kelas')
            $table->date('tanggalperizinan');
            $table->date('tanggalkembali');
            $table->string('perihalperizinan');
            $table->string('keterangankembali');
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
        Schema::dropIfExists('perizinan');
    }
}
