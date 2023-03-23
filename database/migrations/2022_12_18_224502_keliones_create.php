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
            $table->string('pradzia_miestas');
            $table->string('pradzia_salis');
            $table->text('aprasymas');
            $table->string('vairuotojo_id');
            $table->string('tikslas_id');
            $table->integer('transporto_id');
            $table->integer('kaina_suaug');
            $table->integer('kaina_vaikam');
            $table->date('data');
            $table->date('gryzimo_data');
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
