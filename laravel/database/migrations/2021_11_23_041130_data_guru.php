<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nisn');
            $table->enum('jenisKelamin',['L','P']);
            $table->integer('umur');
            $table->enum('status', ['PNS', 'Honorer']);
            $table->string('jabatan');
            $table->string('mapel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
