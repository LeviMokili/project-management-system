<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'Pays',
        'Province',
        'Intitule_du_project',
        'Secteur_activite',
        'Type_de_projet',
        'Zone_intervention',
        'Date_approbation',
        'Date_accord_finance',
        'Date_entree',
        'Duree_projet',
        'Periode_excution',
        'Coute_projet',
        'source_financement',
        'Numero_du_project',
        'Coordonnateur_projet'
    ];
}
