<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghunisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghunis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('tpt_lahir')->nullable();
            $table->string('paroki')->nullable();
            $table->string('tgl_lahir')->nullable();

            $table->string('tpt_baptis')->nullable();
            $table->string('tgl_baptis')->nullable();

            $table->string('pembaptis')->nullable();

            $table->string('tgl_msk_biara')->nullable();
            $table->string('biara_masuk_pertama')->nullable();

            $table->string('no_pakaian')->nullable();

            $table->string('masuki_novisiat_di')->nullable();
            $table->string('tgl_masuk_novisiat')->nullable();

            $table->string('tgl_filial')->nullable();
            $table->string('komunitas_filial')->nullable();

            $table->string('pekerjaan')->nullable();
            $table->string('foto')->nullable();

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
        Schema::dropIfExists('penghunis');
    }
}
