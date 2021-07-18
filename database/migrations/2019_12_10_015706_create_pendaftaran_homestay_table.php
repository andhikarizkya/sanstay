<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranHomestayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_homestay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_homestay');
            $table->char('no_telpon');
            $table->char('harga');
            $table->text('alamat');
            $table->string('wilayah');
            $table->char('kamar');
            $table->text('deskripsi');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_homestay');
    }
}
