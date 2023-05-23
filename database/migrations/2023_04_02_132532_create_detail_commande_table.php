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
        Schema::create('detail_commande', function (Blueprint $table) {
            $table->unsignedBigInteger('idCommande');
            $table->unsignedBigInteger('idPlat');
            $table->integer('quantité_commander');
            $table->foreign('idCommande')->references('id')->on('commandes')->onDelete('cascade');
            $table->foreign('idPlat')->references('id')->on('plats')->onDelete('cascade');
            $table->primary(['idCommande','idPlat']);
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
        Schema::dropIfExists('detail_commande');
    }
};
