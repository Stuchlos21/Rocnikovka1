<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Hour as Authenticatable;


class Hour extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'datum', 'Číslo_ve_dni', 'id_vozidla',
    ];

    protected $primaryKey = 'id_hodiny';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'id_user', 'id_ucitele', 'id_vozidla',
    ];

}