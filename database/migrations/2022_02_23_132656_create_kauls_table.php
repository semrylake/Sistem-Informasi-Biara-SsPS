<?php

use App\Models\Penghuni;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kauls', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Penghuni::class);
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('tgl_kaul');
            $table->string('tpt_kaul');
            $table->string('moto');
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
        Schema::dropIfExists('kauls');
    }
}
