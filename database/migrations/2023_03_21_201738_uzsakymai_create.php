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
        Schema::create('uzsakymai', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('keliones_id');
            $table->string('patvirt_busena');
            $table->string('uzmokest_tipas');
            $table->timestamps();
            $table->softdeletes();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uzsakymai');
        //
    }
};
