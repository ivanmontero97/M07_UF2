<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    use HasFactory;
    protected $table = 'usuaris';

    protected $filleable = [
        'nom',
        'cognom',
        'email',
        'rol',
        'Activo'
    ];

    protected $hidden = [
        'password'
    ];
}
