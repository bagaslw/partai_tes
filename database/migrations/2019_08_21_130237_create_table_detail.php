<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dt_prov', function (Blueprint $table) {
            $table->bigIncrements('id_dt');
            $table->integer('id_prov');
            $table->string('nama_kab');
            $table->integer('jml_kursi');
            $table->integer('hanura');
            $table->integer('berkarya');
            $table->integer('demokrat');
            $table->integer('gerindra');
            $table->integer('golkar');
            $table->integer('nasdem');
            $table->integer('pan');
            $table->integer('pbb');
            $table->integer('perindo');
            $table->integer('pdip');
            $table->integer('pkb');
            $table->integer('pkpi');
            $table->integer('pks');
            $table->integer('ppp');
            $table->integer('psi');
            $table->integer('garuda');
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
        Schema::dropIfExists('dt_prov');
    }
}
