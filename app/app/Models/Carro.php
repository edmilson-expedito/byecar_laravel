<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    protected $table = 'carros';

    protected $fillable = [
        'Fipe',
        'Marca',
        'Modelo',
        'Ano',
        'Preco',
    ];
}
