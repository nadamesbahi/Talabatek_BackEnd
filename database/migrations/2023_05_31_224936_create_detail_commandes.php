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
        //

        Schema::create('detail_commandes', function (Blueprint $table) {
            // $table->id();
            // $table->unsignedBigInteger('idCommande');
            $table->unsignedBigInteger('idPlat')->primary();
            $table->unsignedBigInteger('idClient');
            $table->integer('quantité_commander');
            $table->boolean('total');
            $table->foreign('idPlat')->references('id')->on('plats');
            $table->foreign('idClient')->references('id')->on('clients');
            // $table->primary(['idCommande','idPlat']);
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
        //
    }
};
