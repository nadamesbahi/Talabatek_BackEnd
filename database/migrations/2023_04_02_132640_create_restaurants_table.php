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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('nom',50);
            $table->string('telephone',100);
            $table->string('email',50);
            $table->string('mot_de_passe',10);
            $table->string('adresse',100);
            $table->string('photo',100);
            $table->enum('type_utilisateur',['admin','client','livreur','restaurant'])->default('restaurant');
            $table->enum('etat',['bloquer','non bloquer'])->default('non bloquer');
            $table->unsignedBigInteger('idReservation');
            $table->unsignedBigInteger('idPlat');
            $table->unsignedBigInteger('idCommentaire');
            $table->foreign('idReservation')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('idPlat')->references('id')->on('plats');
            $table->foreign('idCommentaire')->references('id')->on('commentaires')->onDelete('cascade');

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
        Schema::dropIfExists('restaurants');
    }
};
