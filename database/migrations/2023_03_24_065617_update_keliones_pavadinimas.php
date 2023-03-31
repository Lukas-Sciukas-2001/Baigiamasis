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
        Schema::table('keliones', function (Blueprint $table) {
            $table->text('pavadinimas')->nullable();
            $table->text('visibility')->nullable();
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
        Schema::table('keliones', function (Blueprint $table) {
            $table->dropColumn('pavadinimas');
            $table->dropColumn('visibility');
        });
        //
    }
};
