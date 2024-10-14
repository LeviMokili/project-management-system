<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'Intitule',
        'montant',
        'percentage',
        'source_1',
        'source_2',
        'source_3',
        'unique_code'
    ];
}
