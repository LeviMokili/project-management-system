<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadres', function (Blueprint $table) {
            $table->id();
            $table->string('Code_de_réf');
            $table->string('Indicateur');
            $table->string('Composante');
            $table->string('Sous_Composante');
            $table->string('Valeur_de_Référence');
            $table->string('Valeur_cible');
            $table->string('Réalisé');
            $table->string('Percentage');
            $table->string('Comentaire');
            $table->string('unique_code');
            $table->string('year');
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
        Schema::dropIfExists('cadres');
    }
}
