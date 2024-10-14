<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passations', function (Blueprint $table) {
            $table->id();
            $table->string('Decription_du_march');
            $table->string('Numero_Reference_du_marché');
            $table->string('Type_du_marché');
            $table->string('Méthode_de_sélection_du_Marché');
            $table->string('Type_de_révision');
            $table->string('Montant_estimatif_du_Marché');
            $table->string('Montant_réel_du_marché');
            $table->string('Ecart_du_montant');
            $table->string('Date_de_signature_du_contrat');
            $table->string('Date_livaison_Production_du_rapport');
            $table->string('Ecart_de_durée');
            $table->string('Nom_de_entreprise_contractant');
            $table->string('Note_appréciation_du_marché');
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
        Schema::dropIfExists('passations');
    }
}
