<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtbasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptbas', function (Blueprint $table) {
            $table->id();
            $table->string('Code_de_Réf');
            $table->string('Intitulé_de_activité');
            $table->string('Indicateur_de_process');
            $table->string('Unité');
            $table->string('Composante');
            $table->string('Sous_Composante');
            $table->string('Catégorie_financière_Fonds');
            $table->string('Source_de_financement');
            $table->string('Responsable_activité');
            $table->string('Début_activité');
            $table->string('Fin_activité');
            $table->string('Durée_activité');
            $table->string('Prévu_one');
            $table->string('Réalisé_one');
            $table->string('percent_one');
            $table->string('Prévu_two');
            $table->string('Réalisé_two');
            $table->string('percent_two');
            $table->string('Ratio_efficience');
            $table->string('Note_appréciation');
            $table->string('Commentaire');
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
        Schema::dropIfExists('ptbas');
    }
}
