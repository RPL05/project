<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alamat');
            $table->string('images');
            $table->string('telephone');
            $table->string('gender');
            $table->string('agama');
            $table->string('tgl_lahir');
            $table->string('tmpt_lahir');
            $table->string('asal_sekolah');
            $table->string('nama_bapak');
            $table->string('nama_ibu');
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
        Schema::dropIfExists('biodata');
    }
}
