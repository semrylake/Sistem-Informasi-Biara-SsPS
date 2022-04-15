<?php

use App\Models\Penghuni;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Penghuni::class);
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('tpt_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('jk')->nullable();
            $table->string('status')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tlpn')->nullable();
            $table->string('tgl_meninggal')->nullable();
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
        Schema::dropIfExists('keluargas');
    }
}
