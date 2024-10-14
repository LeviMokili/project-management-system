<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptba extends Model
{
    use HasFactory;
    protected $fillable = [
        'Code_de_Réf',
        'Intitulé_de_activité',
        'Indicateur_de_process',
        'Unité',
        'Composante',
        'Sous_Composante',
        'Catégorie_financière_Fonds',
        'Source_de_financement',
        'Responsable_activité',
        'Début_activité',
        'Fin_activité',
        'Durée_activité',
        'Prévu_one',
        'Réalisé_one',
        'percent_one',
        'Prévu_two',
        'Réalisé_two',
        'percent_two',
        'Ratio_efficience',
        'Note_appréciation',
        'Commentaire',
        'year'
    ];
}
