<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //modelo de pedido solitados
    protected $table = "orders";

    protected $fillabel = ['artciulo_id', 'existencia', 'cantidad', 'papeleria_id', 'comentarios'];

    public function Stationery(){

    	return $this->belongsTo(Stationery::class);
    }
}
