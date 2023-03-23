<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keliones', function (Blueprint $table) {
            $table->id();
            $table->string('pradzia_salis');
            $table->string('pradzia_miestas');
            $table->string('stotis');
            $table->text('aprasymas');
            $table->string('vairuotojo_id');
            $table->string('tikslas_salis');
            $table->string('tikslas_miestas');
            $table->integer('transporto_id');
            $table->integer('kaina_suaug');
            $table->integer('kaina_vaikam');
            $table->datetime('isvykimas');
            $table->datetime('gryzimas');
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keliones');
        //
    }
};
