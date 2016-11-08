<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stationery extends Model
{
	//solicitudes de papeleria
    protected $table = "stationeries";

    protected $fillabel = [
    		'estado', 
    		'fechafinalizado',
    		'fechaaprobado', 
    		'fecharecibido', 
    		'comentarios', 
    		'user_id', 
    		'pedido_id'
    		];

    public function user(){

    	return $this->belongsTo(User::class);
    }

    public function order(){

    	return $this->hasOne(Orde::class);
    }
}

