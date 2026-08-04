<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_thn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE _thn MODIFY tahun VARCHAR(4);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_thn');
    }
}
