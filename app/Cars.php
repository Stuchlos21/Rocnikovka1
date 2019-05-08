<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Cars as Authenticatable;

class Cars extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nazev', 'spz', 'rok_vyroby', 'barva', 'typ', 'palivo', 'barva_slovy'
    ];

    protected $primaryKey = 'id_vozu';
}
