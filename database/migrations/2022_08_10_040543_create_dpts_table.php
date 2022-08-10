<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpts', function (Blueprint $table) {
            $table->id();
            $table->string('hash',32);
            $table->string('nkk',16);
            $table->string('nik',16);
            $table->string('nama',200);
            $table->string('kelamin',2);
            $table->text('alamat');
            $table->string('rt',3);
            $table->string('rw',3);
            $table->string('foto_ktp');
            $table->foreignId('desa_id')->constrained('desas')->onDelete('cascade');
            $table->foreignId('kecamaatan_id')->constrained('kecamatans')->onDelete('cascade');
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
        Schema::dropIfExists('dpts');
    }
}
