<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;
    //modelo de pedido solitados
    protected $table = "orders";

    protected $fillabel = ['artciulo_id', 'existencia', 'cantidad', 'papeleria_id', 'comentarios'];

    public function Stationery(){

    	return $this->belongsTo(Stationery::class);
    }

    public function article()
	{
	    return $this->belongsTo(Article::class);
	}
}
