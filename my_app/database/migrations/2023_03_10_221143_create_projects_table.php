<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('Pays');
            $table->string('Province');
            $table->string('Intitule_du_project');
            $table->string('Secteur_activite');
            $table->string('Type_de_projet');
            $table->string('Zone_intervention');
            $table->string('Date_approbation');
            $table->string('Date_accord_finance');
            $table->string('Date_entree');
            $table->string('Duree_projet');
            $table->string('Coute_projet');
            $table->string('source_financement');
            $table->string('Numero_du_project');
            $table->string('Coordonnateur_projet');
            $table->string('unique_code');
            $table->string('code_project');
            $table->string('email');
            $table->string('date_debut');
            $table->string('date_fin');
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
        Schema::dropIfExists('projects');
    }
}
