<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadre extends Model
{
    use HasFactory;
    protected $fillable = [
        'Code_de_réf',
        'Indicateur',
        'Composante',
        'Sous_Composante',
        'Valeur_de_Référence',
        'Valeur_cible',
        'year',
        'Percentage',
        'Comentaire'
    ];
}
