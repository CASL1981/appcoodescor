<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Co extends Model
{
    protected $table = 'cos';

    protected $fillable = [
        'codigo', 'nombre'
    ];

    
}
